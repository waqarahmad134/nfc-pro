<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\ShowUserByEmailRequest;
use App\Http\Requests\ShowUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreCsvData;
use App\Http\Requests\UpdateProfilePicConfirm;
use App\Http\Requests\UpdateProfilePicRequest;
use App\Http\Requests\ViewLoginHistoryRequest;
use App\Models\LoginHistory;
use App\Models\ProfilePicRequest;
use App\Models\SecretCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use PKPass\PKPass;
use PKPass\PKPassException;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => User::get(),
            'error' => "",
            'message' => "Users!"
        ]);
    }

    public function create()
    {
        //
    }

    public function storecsv(StoreCsvData $request){
        $file = $request->file('csv_file');
        $data = array_map('str_getcsv', file($file->path()));

        $emailValidationErrors = [];
        foreach ($data as $index => $row) {
            // Skip the first row (index 0) containing column names
            if ($index === 0) {
                continue;
            }
            $validator = Validator::make([
                'email' => $row[14], // Assuming email is in the 15th column (index 14)
            ], [
                'email' => 'required|email|unique:users,email',
            ]);

            if ($validator->fails()) {
                // Collect email validation errors
                $emailValidationErrors[] = [
                    'email' => $row[14],
                    'errors' => $validator->errors()->all(),
                ];
            } else {
                User::create([
                    'first_name' => $row[0] ?? "",
                    'last_name' => $row[1] ?? "",
                    'company_name' => $row[2] ?? "",
                    'position' => $row[3] ?? "",
                    'website' => $row[4] ?? "",
                    'mobile_number' => $row[5] ?? "",
                    'telephone_number' => $row[6] ?? "",
                    'twitter_url' => $row[7] ?? "",
                    'insta_url' => $row[8] ?? "",
                    'snapchat_url' => $row[9] ?? "",
                    'linkedin_url' => $row[10] ?? "",
                    'fb_url' => $row[11] ?? "",
                    'address' => $row[12] ?? "",
                    'employee_level' => $row[13] ?? "",
                    'email' => $row[14] ?? "",
                    'password' => Hash::make($row[15]),
                    'role' => "employee",
                    'profile_pic' => "profile_pic_default.png",
                    'cover_pic' => "cover_pic_default.png",
                    'created_by' => Auth::user()->id,
                ]);
            }
        }

        if (!empty($emailValidationErrors)) {
            return response()->json([
                'status' => false,
                'data' => $emailValidationErrors,
                'error' => "Something went wrong",
                'message' => "Something went wrong"
            ]);
        }
        else{
            return response()->json([
                'status' => true,
                'data' => $data,
                'error' => "",
                'message' => "User(s) Created!"
            ]);
        }
    }
    
    public function store(CreateUserRequest $request)
    {
        $user = Auth::user();
        $max_allowed = $user->max_allowed;
        $already_created = User::where('created_by',$user->id)->count();

        if($max_allowed != null && $max_allowed > $already_created){
            return response()->json([
                'status' => false,
                'data' => "",
                'error' => "",
                'message' => "Your quota exceed"
            ]);
        }

        $data = $request->except(['profile_pic','cover_pic']);

        foreach($data as $key => $value){
            if($data[$key] != null){
                $returnData[$key] = $value;
            }
        }

        $data = $returnData;

        // upload profile pics
        if ($request->hasFile('profile_pic')) {
            $profile_pic = $request->file('profile_pic');
            $path = 'profile_pics/';
            $profile_pic_name = uniqid() . '.' . $profile_pic->getClientOriginalExtension();
            $profile_pic->move($path, $profile_pic_name);
            $data['profile_pic'] = $profile_pic_name;
        }
        else{
            $data['profile_pic'] = "profile_pic_default.png";
        }

        // upload profile covers
        if ($request->hasFile('cover_pic')) {
            $cover_pic = $request->file('cover_pic');
            $path = 'cover_pics/';
            $cover_pic_name = uniqid() . '.' . $cover_pic->getClientOriginalExtension();
            $cover_pic->move($path, $cover_pic_name);
            $data['cover_pic'] = $cover_pic_name;
        }
        else{
            $data['cover_pic'] = "cover_pic_default.png";
        }

        $data['created_by'] = Auth::user()->id;

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        if($user){
            return response()->json([
                'status' => true,
                'data' => $user,
                'error' => "",
                'message' => "User Created!"
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'data' => "",
                'error' => "Something went wrong",
                'message' => "Something went wrong"
            ]);
        }
    }

    public function show1()
    {
        return "ok";
    }
     
    public function show(ShowUserRequest $request)
    {
        $user = User::find($request->id);
        $pass_data = [
            // "web_url" => route('user.show',["id"=> $request->id]),
            "web_url" => env('APP_URL')."?Uid=".base64_encode($request->id),
            "organization_name" => $user->company_name ?? "",
            "description" => "description",
            "name" => $user->first_name ?? "" . $user->last_name ?? "",
            "designation" => $user->position ?? "",
            "user_id" => $request->id
        ];
        $user['pass_url'] = $this->generate_apple_pass($pass_data);
        $user['profile_pic_base_url'] = $request->root() . '/profile_pics/';
        $user['cover_pic_base_url'] = $request->root() . '/cover_pics/';
        return response()->json([
            'status' => true,
            'data' => $user,
            'error' => "",
            'message' => "User!"
        ]);
    }
    
    public function showbyemail(ShowUserByEmailRequest $request)
    {
        $user = User::where("email",$request->email)->first();
        $pass_data = [
            "formatVersion" => 1,
            "passTypeIdentifier" => "pass.com.saudi360.ewalletPassNew",
            "serialNumber" => "p69f2J",
            "teamIdentifier" => "8P3B84FPPJ",
            "webServiceURL" => env('APP_URL')."?Uid=".$request->id,
            "authenticationToken" => "vxwxd7J8AlNNFPS8k0a0FfUFtq0ewzFdc",
            "locations" => [
                [
                "longitude" => -122.3748889,
                "latitude" => 37.6189722
                ]
            ],
            "barcode" => [
                "message" => env('APP_URL')."?Uid=".$request->id,
                "format" => "PKBarcodeFormatQR",
                "messageEncoding" => "iso-8859-1"
            ],
            "organizationName" => "FIRST PROJECT",
            "description" => "E Wallet Card",
            "logoText" => "FIRST PROJECT",
            "foregroundColor" => "rgb(255, 255, 255)",
            "backgroundColor" => "rgb(0,0,0)",
            "labelColor" => "rgb(255, 255, 255)",
            "storeCard" => [
                "auxiliaryFields" => [
                    [
                        "key" => "name",
                        "label" => "Name",
                        "value" => $user->first_name. " " . $user->last_name
                    ]
                ]
            ]
        ];
        $user['pass_url'] = $this->generate_apple_pass_with_img($pass_data, $user->id);
        $user['profile_pic_base_url'] = $request->root() . '/profile_pics/';
        $user['cover_pic_base_url'] = $request->root() . '/cover_pics/';
        return response()->json([
            'status' => true,
            'data' => $user,
            'error' => "",
            'message' => "User!"
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function updateProfilePicRequest(UpdateProfilePicRequest $request)
    {
        $data = $request->except(['profile_pic','cover_pic']);

        // upload profile pics
        if ($request->hasFile('profile_pic')) {
            $profile_pic = $request->file('profile_pic');
            $path = 'profile_pics/';
            $profile_pic_name = uniqid() . '.' . $profile_pic->getClientOriginalExtension();
            $profile_pic->move($path, $profile_pic_name);
            $data['profile_pic'] = $profile_pic_name;
        }

        // upload profile covers
        if ($request->hasFile('cover_pic')) {
            $cover_pic = $request->file('cover_pic');
            $path = 'cover_pics/';
            $cover_pic_name = uniqid() . '.' . $cover_pic->getClientOriginalExtension();
            $cover_pic->move($path, $cover_pic_name);
            $data['cover_pic'] = $cover_pic_name;
        }

        // send email with secret code to change password
        $secret_code = Hash::make(now());
        $user_email = User::where('email',$request->email)->first();
        $save_secret_code = new SecretCode();
        $save_secret_code->code = $secret_code;
        $save_secret_code->email = $request->email;
        $save_secret_code->expiry_at = now()->addHours(3); // the secret code will be expired after three hours
        $save_secret_code->save();


        $code_data = [
            'name' => $user_email->first_name . " " . $user_email->last_name,
            'email' => $request->email,
            'code' => $secret_code
        ];

        Mail::send('mails.sendSecretCode', $code_data, function ($message) use ($code_data) {
            $message->to($code_data['email'], $code_data['name'])->subject('Confirm Your Email');
        });

        $data['code_id'] = $save_secret_code->id;

        $profile_pic_request = new ProfilePicRequest();

        $profile_pic = $profile_pic_request->create($data);

        if($profile_pic){

            return response()->json([
                'status' => true,
                'data' => $profile_pic_request,
                'error' => "",
                'message' => "Profile change request sent, check you email!"
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'data' => "",
                'error' => "Something went wrong",
                'message' => "Something went wrong"
            ]);
        }

    }

    public function update(UpdateUserRequest $request)
    {
        $user = User::findorFail($request->id);

        $data = $request->except(['profile_pic','cover_pic']);

        foreach($data as $key => $value){
            if($data[$key] != null){
                if($key == "password"){
                    $returnData[$key] = Hash::make($value);
                }
                else{
                    $returnData[$key] = $value;
                }
            }
        }

        $data = $returnData;

        // upload profile pics
        if ($request->hasFile('profile_pic')) {
            $profile_pic = $request->file('profile_pic');
            $path = 'profile_pics/';
            $profile_pic_name = uniqid() . '.' . $profile_pic->getClientOriginalExtension();
            $profile_pic->move($path, $profile_pic_name);
            $data['profile_pic'] = $profile_pic_name;
        }

        // upload profile covers
        if ($request->hasFile('cover_pic')) {
            $cover_pic = $request->file('cover_pic');
            $path = 'cover_pics/';
            $cover_pic_name = uniqid() . '.' . $cover_pic->getClientOriginalExtension();
            $cover_pic->move($path, $cover_pic_name);
            $data['cover_pic'] = $cover_pic_name;
        }

        $user_update = $user->update($data);

        if($user_update){
            return response()->json([
                'status' => true,
                'data' => User::find($request->id),
                'error' => "",
                'message' => "User Updated!"
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'data' => "",
                'error' => "Something went wrong",
                'message' => "Something went wrong"
            ]);
        }

    }

    public function updateProfilePicConfirm(UpdateProfilePicConfirm $request){
        $code_check = SecretCode::where('code',$request->code)->first();

        if($code_check->expiry_at > now()){
            $profile_pic_request = ProfilePicRequest::where('code_id',$code_check->id)->first();

            $user = User::where('email',$request->email)->first();
            $user->profile_pic = $profile_pic_request->profile_pic;


            if($user->save()){
                return response()->json([
                    'status' => true,
                    'data' => $user,
                    'error' => "",
                    'message' => "Profile Pic Changed!"
                ]);
            }
        }
        else{
            return response()->json([
                'status' => false,
                'data' => "",
                'error' => "",
                'message' => "Code Expired"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteUserRequest $request)
    {
        $user = User::find($request->id);
        if($user){
            $user->delete();
            return response()->json([
                'status' => true,
                'data' => "",
                'error' => "",
                'message' => "User Deleted!"
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'data' => "",
                'error' => "Something went wrong",
                'message' => "Something went wrong"
            ]);
        }
    }

    public function bySubAdmin(Request $request, $name = null)
    {
        $id = Auth::user()->id;
        if($name){
            $users = User::orderBy('first_name')
                        ->where('created_by', $id)
                        ->where('role', 'employee')
                        ->where(function ($query) use ($name) {
                            $query->where('first_name', 'like', "%" . $name . "%")
                                ->orWhere('last_name', 'like', "%" . $name . "%");
                        })
                        ->get();

        }
        else{
            $users = User::orderBy('first_name')->where('created_by',$id)->where('role','employee')->get();
        }
        $data['profile_pic_base_url'] = $request->root() . '/profile_pics/';
        $data['cover_pic_base_url'] = $request->root() . '/cover_pics/';
        $data['users'] = $users;

        return response()->json([
            'status' => true,
            'data' => $data,
            'error' => "",
            'message' => "Employees by Sub Admin!"
        ]);
    }

    public function bySubAdminId(Request $request, $id)
    {
        $users = User::orderBy('first_name')->where('created_by',$id)->where('role','employee')->get();
        $data['profile_pic_base_url'] = $request->root() . '/profile_pics/';
        $data['cover_pic_base_url'] = $request->root() . '/cover_pics/';
        $data['users'] = $users;

        return response()->json([
            'status' => true,
            'data' => $data,
            'error' => "",
            'message' => "Employees by Sub Admin!"
        ]);
    }

    public function bySuperAdmin(Request $request)
    {
        $id = Auth::user()->id;
        $subadmins = User::where('created_by',$id)->where('role','subadmin')->pluck('id')->toArray();
        array_push($subadmins, $id);
        $data['profile_pic_base_url'] = $request->root() . '/profile_pics/';
        $data['cover_pic_base_url'] = $request->root() . '/cover_pics/';
        $data['users'] = User::wherein('created_by', $subadmins)->where('role','employee')->get();

        return response()->json([
            'status' => true,
            'data' => $data,
            'error' => "",
            'message' => "Employees by Super Admin!"
        ]);
    }

    public function viewSubAdmins(Request $request)
    {
        $users = User::where('role','subadmin')->get();
        $data['profile_pic_base_url'] = $request->root() . '/profile_pics/';
        $data['cover_pic_base_url'] = $request->root() . '/cover_pics/';
        $data['users'] = $users;

        return response()->json([
            'status' => true,
            'data' => $data,
            'error' => "",
            'message' => "Sub Admins!"
        ]);
    }

    public function viewLoginHistory(ViewLoginHistoryRequest $request)
    {
        $id = $request->id;
        $login_history = LoginHistory::where('user_id',$id)->get();

        return response()->json([
            'status' => true,
            'data' => $login_history,
            'error' => "",
            'message' => "Login History of the User!"
        ]);
    }


    /**
     * @param $pass_data //which contain the details which you want add in pkpass
     * @return string //return .pkpass file link
     * @throws PKPassException
     */
    public function generate_apple_pass(array $pass_data): string
    {
        $pass = new PKPass(storage_path('app/certificates/certificates.p12'), '12341234');
        // Pass content
        $data = [
            "formatVersion" => 1,
            "passTypeIdentifier" => "pass.com.saudi360.ewalletPassNew",
            "serialNumber" => "8j23fm3",
            "webServiceURL" => $pass_data['web_url'] ?? '',
            "authenticationToken" => "vxwxd7J8AlNNFPS8k0a0FfUFtq0ewzFdc",
            "teamIdentifier" => "8P3B84FPPJ",
            "locations" => [
                [
                    "longitude" => -122.3748889,
                    "latitude" => 37.6189722
                ],
                [
                    "longitude" => -122.03118,
                    "latitude" => 37.33182
                ]
            ],
            "barcode" => [
                "message" => $pass_data['web_url'] ?? '',
                "format" => "PKBarcodeFormatQR",
                "messageEncoding" => "iso-8859-1"
            ],
            "organizationName" => $pass_data['organization_name'] ?? '',
            "description" => $pass_data['description'] ?? '',
            "logoText" => "",
            "foregroundColor" => "rgb(22, 55, 110)",
            "backgroundColor" => "rgb(255, 255, 255)",
            "generic" => [
                "primaryFields" => [
                    [
                        "key" => "Name",
                        "value" => $pass_data['name'] ?? ''
                    ]
                ],
                "secondaryFields" => [
                    [
                        "key" => "subtitle",
                        "label" => "Position",
                        "value" => $pass_data['designation'] ?? ''
                    ]
                ],
            ]
        ];
        $pass->setData($data);
        // Add files to the pass
        $pass->addFile(storage_path('app/public/images/icon.png'));
        $pass->addFile(storage_path('app/public/images/icon@2x.png'));
        $pass->addFile(storage_path('app/public/images/logo.png'));
        $pass->addFile(storage_path('app/public/images/logo@2x.png'));

        $pass_file = $pass->create();

        $storagePath = public_path('storage/passes');

        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        $storage_path = 'passes/pass_' .($pass_data['user_id'] ?? '') . '.pkpass';


        Storage::disk('public')->put($storage_path, $pass_file);
        return URL::to('/') . Storage::url($storage_path);
    }


    public function generate_apple_pass_with_img(array $data, string $user_id): string
    {
        $pass = new PKPass(storage_path('app/certificates/certificates.p12'), '12341234');
        $pass->setData($data);
        // Add files to the pass
        $pass->addFile(storage_path('app/public/images/icon.png'));
        $pass->addFile(storage_path('app/public/images/icon@2x.png'));
        $pass->addFile(storage_path('app/public/images/logo.png'));
        $pass->addFile(storage_path('app/public/images/logo@2x.png'));
        $pass->addFile(storage_path('app/public/images/strip.png'));
        $pass->addFile(storage_path('app/public/images/strip@2x.png'));

        $pass_file = $pass->create();

        $storagePath = public_path('storage/passes');

        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        $storage_path = 'passes/pass_' .$user_id . '.pkpass';


        Storage::disk('public')->put($storage_path, $pass_file);
        return URL::to('/') . Storage::url($storage_path);
    }

}
