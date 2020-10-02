@extends('layouts.app_layout')
@section('pageTitle','Roles')
@section('pageSession')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Roles
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Master Settings</li>
                <li class="active">Roles</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"> <i class="fa fa-universal-access"></i> Add / Edit Roles</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form method="post" action="#" id="rolesData">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label for="Name">Role Title <span class="text-danger">*</span></label>
                                        <input type="text" name="name" placeholder="" required class="form-control">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 form-group padding_top_25">
                                        <input type="submit" name="submit" value="Save Role" class="btn btn-primary pull-right" id="SubmitTag">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

                <div class="col-xs-6">
                    @include('masterdata.roles_list')
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
