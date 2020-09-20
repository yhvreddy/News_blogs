@extends('layouts.app_auth')
@section('pageTitle','Reset Account Password')
@section('authSession')
    <div class="login-box-body">
        <p class="login-box-msg">Reset Password</p>

        <form action="{{route('forgetPassword.sendRequest')}}" method="post" id="forgetPasswordRequest">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="email" class="form-control" required name="email" placeholder="Email *">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-6" style="padding-top: 6px;">
                    <a href="{{route('login')}}">Login My Account.</a><br>
                    {{--<a href="{{url('register')}}" class="text-center">Register a new membership</a>--}}
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{_('Reset Password')}}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
@endsection
