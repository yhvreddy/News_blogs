@extends('layouts.app_layout')
@section('pageTitle','Add New User')
@section('pageSession')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add New user
                <small>New user</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Users</li>
                <li class="active">Add User</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"> <i class="fa fa-users"></i> Add New User</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form method="post" action="{{route('saveAddUserAccount')}}" enctype="multipart/form-data" id="addNewUserAccount">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="role">Select Role <span class="text-danger">*</span></label>
                                        <select class="form-control" name="role" required>
                                            <option value="">Select User role</option>
                                            @foreach($roles as $key => $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="Name">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" placeholder="" required class="form-control">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="email">Email Id <span class="text-danger">*</span></label>
                                        <input type="email" name="email" placeholder="" required class="form-control">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="mobile">Mobile <span class="text-danger">*</span></label>
                                        <input type="tel" name="mobile" placeholder="" required class="form-control">
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password" placeholder="" required class="form-control">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <input type="submit" name="submit" value="Add user" class="btn btn-primary pull-right" id="SubmitNewUser">
                                    </div>
                                </div>
                            </form>
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
