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
                    @include('categories.categories_add')
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
