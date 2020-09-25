@extends('layouts.app_layout')
@section('pageTitle','Add Blog')
@section('pageSession')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blogs List
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Blogs</li>
                <li class="active">Add Blog</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"> <i class="fa fa-newspaper-o"></i> Add Blog</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="category">Select Category <span class="text-danger">*</span></label>
                                            <select name="category" required class="form-control select2">
                                                <option value="">Select Category Name</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="subCategory">Select SubCategory <span class="text-danger subcategory"></span></label>
                                            <select name="subcategory" class="form-control select2">
                                                <option value="">Select SubCategory Name</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="bannerImage">Blog Image <span class="text-danger">*</span></label>
                                            <input type="file" name="bannerImage" placeholder="" required class="form-control fileUploadPlugInCustom" data-show-preview="false" accept=".png,.svg,.jpeg,.jpg" data-msg-placeholder="Upload Blog Image">
                                            @error('bannerImage')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="" name="title" maxlength="95" required>
                                            @error('title')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <label for="summery">Summery <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="summary" rows="4" maxlength="225"></textarea>
                                            <span class="text-red"><strong> Note : </strong> Max limit 225 characters only.</span>
                                            @error('summary')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <label for="summery"> Content <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="content" rows="8"></textarea>
                                            @error('content')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12">
                                            <h4><label>Blog Source <small>links, documents, etc,..</small></label></h4>
                                            <div class="row sourceAppOptions">
                                                <div class="col-md-12 form-group">
                                                    <a href="javascript:0;" class="btn btn-success btn-xs addNewAppendSourceLink"> Add Link</a>
                                                    <a href="javascript:0;" class="btn btn-success btn-xs addNewAppendSourceFile"> Add Upload File</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 sourceMainOptions"></div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="tags">Select Tags <span class="text-danger tags"></span></label>
                                            <select name="tags[]" multiple class="form-control select2">
                                            </select>
                                            @error('tags')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <input type="submit" value="Save Blog" class="btn btn-success pull-right">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <script>
        $(document).ready(function () {
            $('.addSourceLinks,.addSourceFiles').hide();
        });

        $('.addNewAppendSourceLink').click(function () {
            addNewAppendSource('urls');
        });
        $('.addNewAppendSourceFile').click(function () {
            addNewAppendSource('files');
        });
        $('.removeAppendSources').click(function () {

        });
        $(".sourceMainOptions").on('click', '.removeAppendSources', function(e){
            e.preventDefault();
            $(this).parent().parent().remove(); //Remove field html
        });
        function addNewAppendSource(type) {
            $.ajax({
                url : "{{url('aPanel/posts/addNew/appendSource')}}"+"/"+type,
                method:"GET",
                success:function (appendNewData) {
                    $(".sourceMainOptions").append(appendNewData);
                }
            })
        }

    </script>
@endsection
