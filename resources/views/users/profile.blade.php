@extends('layouts.app_layout')
@section('pageTitle','User Profile')
@section('pageSession')
    <style>
        .profile{}
        .profile li{}
        .profile li a{font-size: 16px !important;}
        .profile li a span{}
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profile
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-primary">
                            <div class="widget-user-image">
                                @if(!empty($user->profile) && file_exists($user->profile))
                                    <img src="{{asset($user->profile)}}" class="img-circle" alt="User Avatar">
                                @else
                                    <img src="{{asset('default_images/avatar.webp')}}" class="img-circle" alt="User Image">
                                @endif
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">{{$user->name}}</h3>
                            <h5 class="widget-user-desc">{{$user->role_name}}</h5>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked profile">
                                <li><a><span>Name :</span> {{$user->name}}</a></li>
                                <li><a><span>Email :</span> {{$user->email}}</a></li>
                                <li><a><span>Mobile :</span> {{$user->mobile}}</a></li>
                                <li><a><span>Role :</span> {{$user->role_name}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xs-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"> <i class="fa fa-user"></i> Update Profile</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <form class="row" method="post" action="#" enctype="multipart/form-data">
                                        <div class="col-md-4 form-group">
                                            <label for="Name">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" value="{{$user->name}}" placeholder="" required class="form-control">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="email">Email Id <span class="text-danger">*</span></label>
                                            <input type="email" name="email" value="{{$user->email}}" placeholder="" required class="form-control">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="mobile">Mobile <span class="text-danger">*</span></label>
                                            <input type="tel" name="mobile" placeholder="" value="{{$user->mobile}}" required class="form-control">
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <label for="bannerImage">Profile Image </label>
                                            <input type="file" name="profileImage" placeholder="" class="form-control fileUploadPlugInCustom" data-show-preview="false" accept=".png,.svg,.jpeg,.jpg" data-msg-placeholder="Upload Profile Image">
                                            @error('profileImage')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group padding_25">
                                            <input type="submit" class="btn btn-primary pull-right" value="Update Details">
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"> <i class="fa fa-lock"></i> Update Password</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <form class="row" method="post" action="#">
                                        <div class="col-md-4 form-group">
                                            <label for="password">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" placeholder="" required class="form-control">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="confirmPassword">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" name="confirmPassword" placeholder="" required class="form-control">
                                            @error('confirmPassword')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 form-group padding_top_25">
                                            <input type="submit" class="btn btn-primary pull-right" value="Update Password">
                                        </div>
                                    </form>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
