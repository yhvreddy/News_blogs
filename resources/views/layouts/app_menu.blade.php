<?php
$role = DB::table('users')->select('users.role','roles.name as role_name')->join('roles','roles.id','=','users.role')->where('roles.id',Auth::user()->role)->first();
$roleName = strtolower(urlencode($role->role_name));
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(!empty(Auth::User()->profile) && file_exists(Auth::User()->profile))
                    <img src="{{asset(Auth::User()->profile)}}" class="img-circle" alt="User Image">
                @else
                    <img src="{{asset('default_images/avatar.webp')}}" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{Auth::User()->name}}</p>
                @if(Cache::has('user-is-online-'.Auth::user()->id))
                    <a href="javascript:0;"><i class="fa fa-circle text-success"></i> Online</a>
                @else
                    <a href="javascript:0;"><i class="fa fa-circle text-gray"></i> Offline</a>
                @endif
                <a href="javascript:0;" class="pull-right hidden"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
        </div>
        <!-- search form -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{route('dashboard',['role' => $roleName])}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li><a href="{{route('users.list',['role' => $roleName])}}"><i class="fa fa-users"></i> <span>Users</span></a></li>
            <li>
                <a href="{{route('categories', ['role' => $roleName])}}">
                    <i class="fa fa-list-alt"></i> <span>Categories</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-list"></i> <span>SubCategories</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Tags</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Add Blog</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Blog List</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span>Master Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Roles</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Permissions</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
