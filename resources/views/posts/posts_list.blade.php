@extends('layouts.app_layout')
@section('pageTitle','Posts List')
@section('pageSession')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Posts List
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Posts</li>
                <li class="active">Posts List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"> <i class="fa fa-newspaper-o"></i> Posts List</h3>
                            <a href="{{route('posts.add', ['role'=> strtolower(urlencode($roleName->role_name))])}}" class="btn btn-primary btn-xs pull-right">Add Blog</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dataTable">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th width="20">#</th>
                                        <th></th>
                                        <th>Category</th>
                                        <th>SubCategory</th>
                                        <th width="250">Title</th>
                                        <th>Created</th>
                                        <th>Status</th>
                                        <th width="150">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $key => $value)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>
                                                    @if(isset($value->cover_image) && file_exists($value->cover_image))
                                                        <img src="{{asset($value->cover_image)}}" class="img-circle">
                                                    @else
                                                        <img src="{{asset('default_images/image.svg')}}" class="img-circle">
                                                    @endif
                                                </td>
                                                <td>{{$value->category_id}}</td>
                                                <td>{{ (isset($value->subcategory_id)) ? $value->subcategory_id : '' }}</td>
                                                <td>{{$value->title}}</td>
                                                <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                                                <td>{{$value->psi_name}}</td>
                                                <td align="center">
                                                    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                                        <span data-toggle="tooltip" title="Publish"><a href="javascript:0;" class="text-success"><i class="fa fa-check fa_s20"></i></a></span>&nbsp;
                                                    @endif
                                                    <span data-toggle="tooltip" title="Forward TO"><a href="javascript:0;"><i class="fa fa-send fa_s20"></i></a></span>&nbsp;
                                                    <span data-toggle="tooltip" title="Send Back"><a href="javascript:0;"><i class="fa fa-recycle fa_s20"></i></a></span>&nbsp;
                                                    <span data-toggle="tooltip" title="View"><a href="javascript:0;"><i class="fa fa-newspaper-o fa_s20"></i></a></span>&nbsp;
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

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
