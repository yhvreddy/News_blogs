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
                            <form method="post" action="{{route('saveCategoryData')}}" enctype="multipart/form-data" id="newCategoryData">
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
                                        <label for="icon">Category Icon <span class="text-danger">*</span></label>
                                        <input type="file" name="icon" placeholder="" required class="form-control fileUploadPlugInCustom" data-show-preview="false" accept=".png,.svg,.jpeg,.jpg" data-msg-placeholder="Upload Category Icon">
                                        @error('icon')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 col-md-offset-4 form-group">
                                        <input type="submit" name="submit" value="Add Category" class="btn btn-primary" id="SubmitCategory">
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
                    @include('categories.categories_list')
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
