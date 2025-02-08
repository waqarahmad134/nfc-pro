@extends('welcome')
@section('content')

<div id="main-content">
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>Users</h2>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>

                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Users</h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
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
                                        <th>Position</th>
                                        <!--<th>Status</th>-->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    ?>
                                    @foreach($data->users as $key=>$d)
                                  
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$d->id ?? ''}}</td>
                                        <td>{{$d->first_name ?? ''}}</td>
                                        <td>{{$d->last_name ?? ''}}</td>
                                        <td>{{$d->mobile_number ?? ''}}</td>
                                        <td>{{$d->email ?? ''}}</td>
                                        <td>{{$d->company_name ?? ''}}</td>
                                        <td>{{$d->position ?? ''}}</td>
                                        <!--<td>-->
                                        <!--    @if(isset($d->status) && $d->status == 1)-->
                                        <!--    <span>Active</span>-->
                                        <!--    @else-->
                                        <!--    <span>Block</span>-->
                                        <!--    @endif-->
                                        <!--</td>-->
                                        <td>
                                            <div class="dropdown dropleft" style="display: inline-block !important;">
                                                <button href="javascript:void(0);" class="dropdown-toggle btn btn-secondary" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Action</button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item">
                                                        <a href="{{route('editUser',['id'=>base64_encode($d->id)])}}">Edit</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a href="{{route('userdetails',['id'=>base64_encode($d->id)])}}">Details</a>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <a type="button" href="{{ route('delete_user', ['id' => $d->id]) }}" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                   
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

@endsection