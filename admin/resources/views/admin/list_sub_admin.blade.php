@extends('welcome')
@section('content')

<div id="main-content">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>List Sub Admin</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">List Sub Admin</li>
                </ul>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <a href="{{route('add_sub_admin')}}" type="button" class="btn btn-info">Add Sub Admin</a>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li>
                                <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse">
                                    <i class="icon-refresh"></i>
                                </a>
                            </li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                <!-- <table class="table table-bordered table-striped table-hover dataTable js-exportable"> -->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User ID</th>
                                        <th>First Name</th>
                                        <th>last Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Company Name</th>
                                        <!-- <th>Position</th>
                                        <th>Created At</th> -->
                                        <!--<th>Status</th>-->
                                        <!--<th>Status Update</th>-->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    ?>
                                    @foreach($data->users as $key=>$d)
                                    @if($d->role == 'subadmin')
                                    <tr class="text-capitalize">
                                        <td>{{$count++}}</td>
                                        <td>{{$d->id ?? ''}}</td>
                                        <td>{{$d->first_name ?? ''}}</td>
                                        <td>{{$d->last_name ?? ''}}</td>
                                        <td>{{$d->mobile_number ?? ''}}</td>
                                        <td>{{$d->email ?? ''}}</td>
                                        <td>{{$d->company_name ?? ''}}</td>
                                        <!-- <td>{{$d->position ?? ''}}</td>
                                        <td>{{date('d,M Y h:i:s',strtotime($d->created_at)) ?? ''}}</td> -->
                                        <!--<td>-->
                                        <!--    <span>{{$d->status ?? ''}}</span>-->
                                        <!--</td>-->
                                        <!--<td>-->
                                        <!--    @if(isset($d->status) && $d->status == "active")-->
                                        <!--    <a href="{{route('block_admin',['id'=>$d->id])}}" class="btn" style="background-color: #c70032; color: white;">Block</a>-->
                                        <!--    @else-->
                                        <!--    <a href="{{route('active_admin',['id'=>$d->id])}}" class="btn" style="background-color: #002E63; color: white;">Active</a>-->
                                        <!--    @endif-->
                                        <!--</td>-->
                                        <td>
                                            <div class="dropdown dropleft" style="display: inline-block !important;">
                                                <button href="javascript:void(0);" class="dropdown-toggle btn btn-secondary" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Action</button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item">
                                                        <a href="{{route('login_history',['id'=>$d->id])}}">Login History</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="{{route('edit_subadmin',['id'=>base64_encode($d->id)])}}">Edit</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="{{route('userdetails',['id'=>base64_encode($d->id)])}}">Details</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="{{route('empbysubadminid',['id'=>base64_encode($d->id)])}}">View Employees</a>
                                                    </li>
                                                    <!--<li class="dropdown-item">-->
                                                    <!--    <a href="#" class="confirmable">Delete</a>-->
                                                    <!--</li>-->
                                                    <li class="dropdown-item">
                                                        <a type="button" href="{{ route('delete_user', ['id' => $d->id]) }}" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                                    </li>
                                                   
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="{{route('add_sub_admin')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="erur" class="alert alert-danger" style="display:none;"></div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <label>First Name</label>
                            <input name="firstName" type="text" class="form-control" placeholder="Enter First Name Here" required>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <label>Last Name</label>
                            <input name="lastName" type="text" class="form-control" placeholder="Enter Last name here" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" autocomplete="off" placeholder="Enter Email Address Here" required>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <label>Phone</label>
                            <input name="phoneNum" type="tel" class="form-control" placeholder="Enter Phone Here" required pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Enter Password Here" required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="add_admin()" type="" class="btn btn-primary">Add Admin</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // To use Required of HTML  
    // $("#register").submit(function(e) {
    // e.preventDefault();

    function add_admin() {
        event.preventDefault();
        firstName = $("input[name=firstName]").val();
        lastName = $("input[name=lastName]").val();
        email = $("input[name=email]").val();
        phoneNum = $("input[name=phoneNum]").val();
        password = $("input[name=password]").val();

        if (firstName == "") {
            document.getElementById('erur').style.display = "block";
            document.getElementById('erur').innerHTML = 'Please Submit First Name !';
            //  block of code to be executed if the condition is true
        } else if (lastName == "") {
            document.getElementById('erur').style.display = "block";
            document.getElementById('erur').innerHTML = 'Submit Last Name !';
            //  block of code to be executed if the condition is true
        } else if (email == "") {
            document.getElementById('erur').style.display = "block";
            document.getElementById('erur').innerHTML = 'Add Valid Email';
            //  block of code to be executed if the condition is true
        } else if (phoneNum == "") {
            document.getElementById('erur').style.display = "block";
            document.getElementById('erur').innerHTML = 'Add Phone Number';
            //  block of code to be executed if the condition is true
        } else if (password == "") {
            document.getElementById('erur').style.display = "block";
            document.getElementById('erur').innerHTML = 'Do Mention Password';
            //  block of code to be executed if the condition is true
        } else {

            $.ajax({
                url: "{{route('add_sub_admin')}}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "firstName": firstName,
                    "lastName": lastName,
                    "email": email,
                    "phoneNum": phoneNum,
                    "password": password,
                },
                success: function(response) {
                    console.log(response);
                    if (response.status == false) {
                        toastr.error(response.message, 'Error');
                        // $("#formular").modal('show');
                    } else {
                        location.reload();
                        toastr.info('Admin Created Sucessfully', 'Info');
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    }
</script>

@endsection