@extends('layouts.app_layout')
@section('pageTitle','Categories')
@section('pageSession')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Categories
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Categories</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-4">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"> <i class="fa fa-list-alt"></i> Add Categories</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form method="post" action="{{route('saveAddUserAccount')}}" enctype="multipart/form-data" id="addNewUserAccount">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="Name">Category Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" placeholder="" required class="form-control">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="email">Category Icon <span class="text-danger">*</span></label>
                                        <input type="file" name="icon" placeholder="" required class="form-control">
                                        @error('icon')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <input type="submit" name="submit" value="Add Category" class="btn btn-primary pull-right" id="SubmitNewUser">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-xs-8">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"> <i class="fa fa-users"></i> Add New User</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
