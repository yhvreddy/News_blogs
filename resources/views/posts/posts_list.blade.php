@extends('layouts.app_layout')
@section('pageTitle','Blogs List')
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
                <li class="active">Blogs List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"> <i class="fa fa-newspaper-o"></i> Blogs List</h3>
                            <a href="{{route('posts.add', ['role'=> strtolower(urlencode($roleName->role_name))])}}" class="btn btn-primary btn-xs pull-right">Add Blog</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped customDataTable">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th width="20">#</th>
                                        <th></th>
                                        <th>Category</th>
                                        <th>SubCategory</th>
                                        <th>Title</th>
                                        <th>Tags</th>
                                        <th>Created</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
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
