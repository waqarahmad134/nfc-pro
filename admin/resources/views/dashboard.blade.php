@extends('welcome')
@section('content')

<div id="main-content">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>Dashboard {{session()->get('role')}}</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard  </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-3">
                <div class="card shadow-lg" style="background-color: #000000; color: white; border-radius: 8px; border-color: #000000;">
                    <div class="card-body">
                        <h5 class="card-title">Super Admin</h5>
                        <h4 class="card-text" id="super-admin"></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="card shadow-lg" style="background-color: #000000; color: white; border-radius: 8px; border-color: #000000;">
                    <div class="card-body">
                        <h5 class="card-title">Sub Admin</h5>
                        <h4 class="card-text" id="sub-admin"></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="card shadow-lg" style="background-color: #000000; color: white; border-radius: 8px; border-color: #000000;">
                    <div class="card-body">
                        <h5 class="card-title">Employee's</h5>
                        <h4 class="card-text" id="employees"></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="card shadow-lg" style="background-color: #000000; color: white; border-radius: 8px; border-color: #000000;">
                    <div class="card-body">
                        <h5 class="card-title">All Users</h5>
                        <h4 class="card-text" id="all-users">{{$data->Response->totalBookings ?? ''}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $jsonData = json_encode($data);
@endphp

<script>
    const data = @json($data);
    const superadmins = data.filter(item => item.role === "superadmin");
    const subadmins = data.filter(item => item.role === "subadmin");
    const employees = data.filter(item => item.role === "employee");
    const superadminCount = superadmins.length;
    const subadminCount = subadmins.length;
    const employeeCount = employees.length;
    $("#super-admin").html(superadminCount);
    $("#sub-admin").html(subadminCount);
    $("#employees").text(employeeCount);

    $("#all-users").text(data.length);
    
</script>

@endsection