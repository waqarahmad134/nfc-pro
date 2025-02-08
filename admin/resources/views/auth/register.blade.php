<!doctype html>
<html lang="en">
<head>
    <title>:: Register ::</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="{{env('APP_TITLE')}} Template">
    <meta name="author" content="waqar">
    
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/color_skins.css')}}">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<style>
.auth-main{
    margin-top:50px !important;
}
.theme-orange .auth-main:after{
    background:#000000 !important;
}
.theme-orange .auth-main:before{
    background:#000000 !important;
}
</style>
<body class="theme-orange">
    <!-- WRAPPER -->
    <div id="wrapper" class="auth-main">
        <div class="container">
            <div class="row clearfix">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="javascript:void(0);">
                            <img src="{{asset('public/assets/images/logo.webp')}}" class="d-inline-block align-top mr-2 img-fluid" alt="{{env('APP_TITLE')}} logo" width="160">
                        </a>
                    </nav>
                </div>
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4">
                    <div class="card" style="background-color: lightgrey; border-color: lightgrey;">
                        <div class="header">
                            <p class="lead" style="color: black;">Create an account</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" method="POST" action="{{route('registers')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="signup-email" class="control-label sr-only">First Name</label>
                                    <input name="firstName" type="text" class="form-control" id="signup-email" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label for="signup-email" class="control-label sr-only">Last Name</label>
                                    <input name="lastName" type="text" class="form-control" id="signup-email" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <label for="signup-email" class="control-label sr-only">Email</label>
                                    <input name="email" type="email" class="form-control" id="signup-email" placeholder="Your email">
                                </div>
                                <div class="form-group">
                                    <label for="signup-email" class="control-label sr-only">Phone</label>
                                    <input name="phoneNum" type="text" class="form-control" id="signup-email" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label for="signup-password" class="control-label sr-only">Password</label>
                                    <input name="password" type="password" class="form-control" id="signup-password" placeholder="Password">
                                </div>
                                <button onclick="register()" type="submit" class="btn btn-primary btn-lg btn-block" style="background-color: #000000; border-color: #000000;">REGISTER</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
<div class="modal fade" id="formular">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="alert alert-block alert-danger">
                    <h4>Error !</h4>
                    <span id="error" >Email or Password incorrect!</span>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('public/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('public/assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('public/assets/bundles/mainscripts.bundle.js')}}"></script>

<script>
    
    function register()
    {
        event.preventDefault();

        firstName=$("input[name=firstName]").val();
        lastName=$("input[name=lastName]").val();
        email=$("input[name=email]").val();
        phoneNum=$("input[name=phoneNum]").val();
     
        password=$("input[name=password]").val();
       
       
        $.ajax({
        url:"{{route('registers')}}",
        type: "post",
        data: {
            "_token": "{{ csrf_token() }}",
            "email": email,
            "password": password,
            "firstName": firstName,
            "lastName": lastName,
            "phoneNum": phoneNum,
          
        } ,
        success: function (response) {
            console.log(response);
            if(response.ResponseCode==1)
            {
                window.location.replace("{{env('APP_URL')}}admin/login");
            }

           if(response.ResponseCode==0)
            {
                toastr.error(response.errors, 'Error');
                // $("#formular").modal('show');
            }
           
          
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
    }
    </script>
      <script>
      
        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.error("{!! session('error') !!}");
            
        @endif
      
        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.info("{{ session('info') }}");
            
        @endif
      </script>   
</body>
