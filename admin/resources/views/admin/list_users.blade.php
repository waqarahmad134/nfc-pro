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
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    ?>
                                    @foreach($data as $key=>$d)
                                    @if($d->role == 'employee')
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$d->id ?? ''}}</td>
                                        <td>{{$d->first_name ?? ''}}</td>
                                        <td>{{$d->last_name ?? ''}}</td>
                                        <td>{{$d->mobile_number ?? ''}}</td>
                                        <td>{{$d->email ?? ''}}</td>
                                        <td>{{$d->company_name ?? ''}}</td>
                                        <td>{{$d->position ?? ''}}</td>
                                        <td>
                                            {{$d->status}}
                                        </td>
                                        <td>
                                            @if(isset($d->status) && $d->status !== 'active' )
                                            <a href="{{route('active_admin',['id'=>$d->id])}}" class="btn" style="background-color: #002E63; color: white;">Active</a>
                                            @else
                                            <a href="{{route('block_admin',['id'=>$d->id])}}" class="btn" style="background-color: #c70032; color: white;">Block</a>
                                            @endif
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

@endsection