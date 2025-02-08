<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Cookie;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function block_admin($id)
    {
        $data = array(
            'id' => $id,
            'status' => 'block'
        );
        $url = env('BASE_URL') . "user/update";
        $client = new \GuzzleHttp\Client();
        $token = session('token');
        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Authorization' => 'Bearer ' . $token,],
            'body'    => json_encode($data)
        ]);
        $response = $response->getBody()->getContents();
        $data = json_decode($response);

        session()->flash('error', 'Blocked Successfully!');
        return redirect()->back();
    }
    public function login_history($id)
    {
        $data = array(
            'id' => $id
        );
        $url = env('BASE_URL') . "view-login-history";
        $client = new \GuzzleHttp\Client();
        $token = session('token');
        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Authorization' => 'Bearer ' . $token,],
            'body'    => json_encode($data)
        ]);
        $response = $response->getBody()->getContents();
        $data = json_decode($response);

        return view('admin.view_login_history')->with("logins",$data->data);
    }
    
    public function delete_user_user($id)
    {
        $data = array(
            'id' => $id
        );
        $url = env('BASE_URL') . "user/destroy";
        $client = new \GuzzleHttp\Client();
        $token = session('token');
        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Authorization' => 'Bearer ' . $token,],
            'body'    => json_encode($data)
        ]);
        $response = $response->getBody()->getContents();
        $data = json_decode($response);

        session()->flash('error', 'Deleted Successfully!');
        return redirect()->back();
    }

    public function active_admin($id)
    {
        $data = array(
            'id' => $id,
            'status' => 'active'
        );
        $url = env('BASE_URL') . "user/update";
        $client = new \GuzzleHttp\Client();
        $token = session('token');
        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Authorization' => 'Bearer ' . $token,],
            'body'    => json_encode($data)
        ]);
        $response = $response->getBody()->getContents();
        $data = json_decode($response);
        session()->flash('warning', ' Activated Successfully!');
        return redirect()->back();
    }

    public function delete_user($id)
    {
        $client = new \GuzzleHttp\Client();
        $url = env('BASE_URL') . "/users/deladmin/" . $id;
        $request = $client->delete($url);
        session()->flash('error', 'User Deleted Successfully!');
        return redirect()->route('list_users');
    }


    public function userdetails($id)
    {
        return view('userdetails')->with('id' , $id);
    }
    
    public function employee_by_subadmin(){
        $client = new \GuzzleHttp\Client();
        $token = session('token');
        $request = $client->get(env('BASE_URL') . 'employee-by-subadmin', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token, // Add the bearer token to the request headers
            ],
        ]);
        $response = $request->getBody()->getContents();
        $data = json_decode($response);
        return view('admin.employee_users', ['data' => $data->data]);
    }
    
    public function empbysubadminid($id){
        $client = new \GuzzleHttp\Client();
        $token = session('token');
        $request = $client->get(env('BASE_URL') . 'employee-by-subadmin-id/'.$id, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token, // Add the bearer token to the request headers
            ],
        ]);
        $response = $request->getBody()->getContents();
        $data = json_decode($response);
        return view('admin.employee_users', ['data' => $data->data]);
    }
    
    public function list_users()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get(env('BASE_URL') . 'user');
        $response = $request->getBody()->getContents();
        $data = json_decode($response);
        return view('admin.list_users', ['data' => $data->data]);
    }



    public function add_employee(Request $request)
    {
        $data = array(
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phoneNum' => $request->phoneNum,
            'password' => $request->password,
            'status' => true
        );

        $url = env('BASE_URL') . "/users/add/employee";
        $client = new \GuzzleHttp\Client();
        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            'body'    => json_encode($data)
        ]);


        $response = $response->getBody()->getContents();
        $data = json_decode($response);
        if ($data->ResponseCode == 0) {
            return response()->json(['message' => 'Email or Phone num already exist', 'status' => false]);
            //  return response()->json(['message'=>$data->ResponseMessage,'status'=>false]);
        } else {
            return response()->json(['message' => 'Admin Created', 'status' => true]);
        }
    }

    public function edit(Request $request , $id)
    {
        $client = new \GuzzleHttp\Client();
    $token = session('token'); // Retrieve bearer token from the session
    $url = env('BASE_URL') . 'user/show'; // Set the base URL without the ID in the path
    
    $response = $client->get($url, [
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
        ],
        'query' => [
            'id' => $id, // Add the ID as a query parameter
        ],
    ]);
    
    $data = json_decode($response->getBody()->getContents());
        return view('edit', ['data' => $data->data]);
    }
    public function edit_subadmin(Request $request , $id)
    {
        $client = new \GuzzleHttp\Client();
    $token = session('token'); // Retrieve bearer token from the session
    $url = env('BASE_URL') . 'user/show'; // Set the base URL without the ID in the path
    
    $response = $client->get($url, [
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
        ],
        'query' => [
            'id' => $id, // Add the ID as a query parameter
        ],
    ]);
    
    $data = json_decode($response->getBody()->getContents());
        return view('edit_subadmin', ['data' => $data->data]);
    }

    public function editUser(Request $request , $id)
    {
        $client = new \GuzzleHttp\Client();
    $token = session('token'); // Retrieve bearer token from the session
    $url = env('BASE_URL') . 'user/show'; // Set the base URL without the ID in the path
    
    $response = $client->get($url, [
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
        ],
        'query' => [
            'id' => $id, // Add the ID as a query parameter
        ],
    ]);
    
    $data = json_decode($response->getBody()->getContents());
        return view('edit-user-profile', ['data' => $data->data]);
    }
    
    
    public function list_sub_admin()
    {
        $client = new \GuzzleHttp\Client();
        $token = session('token'); // Retrieve bearer token from the session
        $request = $client->get(env('BASE_URL') . 'view-subadmins', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token, // Add the bearer token to the request headers
            ],
        ]);
        $response = $request->getBody()->getContents();
        $data = json_decode($response);
        return view('admin.list_sub_admin', ['data' => $data->data]);
    }


    public function sub_admin_user_list()
    {
        $client = new \GuzzleHttp\Client();
        $token = session('token');
        $request = $client->get(env('BASE_URL') . 'employee-by-subadmin', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token, // Add the bearer token to the request headers
            ],
        ]);
        return $request;
        $response = $request->getBody()->getContents();
        $data = json_decode($response);
        return view('admin.list_sub_admin', ['data' => $data->data]);
    }

    public function add_admin(Request $request)
    {
        $data = array(
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phoneNum' => $request->phoneNum,
            'password' => $request->password,
            'status' => true
        );

        $url = env('BASE_URL') . "/users/add";

        $client = new \GuzzleHttp\Client();
        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            'body'    => json_encode($data)
        ]);
        $response = $response->getBody()->getContents();
        $data = json_decode($response);
        if ($data->ResponseCode == 0) {
            session()->flash('warning', 'Logout!');
            return response()->json(['message' => 'Email or Phone num already exist', 'status' => false]);
            //  return response()->json(['message'=>$data->ResponseMessage,'status'=>false]);
        } else {
            session()->flash('warning', 'Sub Admin Created!');
            return response()->json(['message' => 'Sub Admin Created', 'status' => true]);
        }
    }


    public function delete_admin($id)
    {
        $client = new \GuzzleHttp\Client();
        $url = env('BASE_URL') . "/users/deladmin/" . $id;
        $request = $client->delete($url);
        session()->flash('error', 'Deleted Successfully!');
        return redirect()->back();
    }
    
    public function change_my_password(){
        return view('change-my-password');
    }

    public function login(Request $request)
    {
        $dataa = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        $url = env('BASE_URL') . "login";
        $client = new \GuzzleHttp\Client();
        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            'body'    => json_encode($dataa)
        ]);

        $response = $response->getBody()->getContents();
        $data = json_decode($response);
       if (is_object($data) && property_exists($data, 'data') && is_object($data->data) && property_exists($data->data, 'user') && $data->data->user->role == "employee") {
    return redirect()->back()->with('info', 'You are an Employee. You can\'t log in, or you are not an Admin.');
}

        else if ($data->status == true) {
            $token = $data->data->token;
            $user_data = $data->data->user;
            session()->put('token', $token);
            session()->put('user_data', $user_data);
            session()->put('role', $user_data->role);
            session()->put('status', $data->status);
            if($data->data->user->role == "subadmin"){
                return redirect()->route('employee_users')->with('info', $data->message);
            }
            
            else{
                return redirect()->route('home')->with('info', $data->message);
            }
        } else {
            return redirect()->back()->with('info', 'Wrong Credential or you are not Admin');
        }
    }

    public function change_password_post(Request $request)
    {
        $data = array(
            'oldPassword' => $request->old,
            'newPassword' => $request->neww,
        );
        //  return $data;
        $token = session()->get('token');
        $url = env('BASE_URL') . "/users/updatepassword";
        $client = new \GuzzleHttp\Client();
        $response = $client->put($url, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'accessToken' => $token,],
            'body'    => json_encode($data)
        ]);
        return $response;
        $response = $response->getBody()->getContents();
        $data = json_decode($response);
        return $data->Response;
    }

    public function loginget()
    {
        if (session()->get('token')) {
            return redirect()->route('home');
        } else {
            return view('auth/login');
        }
    }

    public function subadminlogin()
    {
        if (session()->get('token')) {
            return redirect()->route('home');
        } else {
            return view('auth/sub-admin-login');
        }
    }

    public function register(Request $request)
    {
        $data = array(
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phoneNum' => $request->phoneNum,
            'password' => $request->password,
            'status' => true
        );

        $url = env('BASE_URL') . "/users/add";
        $client = new \GuzzleHttp\Client();
        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            'body'    => json_encode($data)
        ]);
        $response = $response->getBody()->getContents();
        $data = json_decode($response);
        return $data;
    }


    public function csv()
    {
        return view('csv');
    }
    
    public function otp()
    {
        return view('auth.otp');
    }

    public function otppost(Request $request)
    {

        $data = array(
            'email' => $request->email,
            'code' => $request->code,
            'password' => $request->password,
        );
        $url = env('BASE_URL') . "change-password";

        $client = new \GuzzleHttp\Client();
        $response = $client->post($url, [
            'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json'],
            'body'    => json_encode($data)
        ]);
        $response = $response->getBody()->getContents();
        $data = json_decode($response);

        if ($data->status == false) {
            return redirect()->route('otp')->with('error', $data->message);
        } else {
            return redirect()->route('login')->with('info', $data->message);
        }
    }

    public function logout()
    {
        session()->flush('token');
        session()->flush('response');
        session()->flash('warning', 'Logout!');
        return redirect()->route('login')->with('info', 'Logout!');
    }
}
