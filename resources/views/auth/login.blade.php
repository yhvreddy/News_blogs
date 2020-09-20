@extends('layouts.app_auth')
@section('pageTitle','Login Account')
@section('authSession')
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{route('accessAccount')}}" id="accessAccount" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="email" class="form-control" required name="email" placeholder="Email *">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" required name="password" placeholder="Password *">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-8" style="padding-top: 6px;">
                    <a href="{{url('forgetPassword')}}"> {{_('I forgot my password')}} </a><br>
                    {{-- <a href="{{url('register')}}" class="text-center">Register a new membership</a> --}}
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"> {{_('Sign In')}} </button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
@endsection
