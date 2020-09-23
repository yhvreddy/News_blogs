@extends('layouts.app_layout')
@section('pageTitle','Users list')
@section('pageSession')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users Accounts
                <small>Users list</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Users</li>
                <li class="active">Users List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"> <i class="fa fa-users"></i> Users List</h3>
                            <a href="{{route('users.addNewUser',['role'=>'user'])}}" class="btn btn-primary btn-xs pull-right">Add New User</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped customDataTable">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th width="20">#</th>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>eMail</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td align="center">
                                                @if(!empty($user->profile) && file_exists($user->profile))
                                                    <img src="{{asset($user->profile)}}" class="img-circle" alt="User Image" style="width: 25px">
                                                @else
                                                    <img src="{{asset('default_images/avatar.webp')}}" class="img-circle" style="width: 25px" alt="User Image">
                                                @endif
                                            </td>
                                            <td>
                                                @if(Cache::has('user-is-online-'.$user->id))
                                                    <span data-toggle="tooltip" title="{{$user->name}} is Online"><a><i class="fa fa-circle text-success"></i> &nbsp; </a></span>
                                                @else
                                                    <span data-toggle="tooltip" title="{{$user->name}} is Offline"><a><i class="fa fa-circle text-gray"></i> &nbsp; </a></span>
                                                @endif
                                                {{$user->name}}
                                            </td>
                                            <td>{{$user->role_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->mobile}}</td>
                                            <td>
                                                @if($user->status == 1 && $user->is_verified == 1)
                                                    <a href="javascript:0;" class="label label-success"><i class="fa fa-circle text-success"></i> &nbsp; Active</a>
                                                @elseif($user->status == 0 && $user->is_verified == 1)
                                                    <a href="javascript:0;" class="label label-warning"><i class="fa fa-circle text-gray"></i> &nbsp; Inactive</a>
                                                @elseif($user->status == 1 && $user->is_verified == 0)
                                                    <a href="javascript:0;" class="label label-primary"><i class="fa fa-circle text-gray"></i> &nbsp; Not Verified</a>
                                                @elseif($user->status == 0 && $user->is_verified == 0)
                                                    <a href="javascript:0;" class="label label-danger"><i class="fa fa-circle text-gray"></i> &nbsp; Deactivate</a>
                                                @endif
                                            </td>
                                            <td align="center">
                                                @if($user->status == 0)
                                                    <span data-toggle="tooltip" title="Click to Active"><a href="javascript:0;" class="text-danger"><i class="fa fa-power-off fa_s20"></i></a></span>&nbsp;
                                                @elseif($user->status == 1)
                                                    <span data-toggle="tooltip" title="Click to Deactivate"><a href="javascript:0;" class="text-success"><i class="fa fa-power-off fa_s20"></i></a></span>&nbsp;
                                                @endif
                                                <span data-toggle="tooltip" title="Details"><a href="javascript:0;"><i class="fa fa-id-card fa_s20"></i></a></span>&nbsp;
                                                <span data-toggle="tooltip" title="Edit"><a href="javascript:0;"><i class="fa fa-edit fa_s20"></i></a></span>&nbsp;
                                                <span data-toggle="tooltip" title="Delete"><a href="javascript:0;"><i class="fa fa-trash-o fa_s20"></i></a></span>&nbsp;
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
