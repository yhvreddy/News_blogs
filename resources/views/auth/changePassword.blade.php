@extends('layouts.app_auth')
@section('pageTitle','Reset Password')
@section('authSession')
    <div class="login-box-body">
        <p class="login-box-msg">Reset Password</p>

        <form action="{{route('change.toNew.password')}}" id="changeNewpassword" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="email" value="{{$user->email}}">
            <input type="hidden" name="id" value="{{$user->id}}">
            <input type="hidden" name="_request_token" value="{{$forget_request->_token}}">
            <input type="hidden" name="_request_token_id" value="{{$forget_request->id}}">
            <div class="form-group has-feedback">
                <input type="password" class="form-control" required name="password" placeholder="New Password *">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" required name="confirmPassword" placeholder="Confirm Password *">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('confirmPassword')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-6" style="padding-top: 6px;">
                    {{--<a href="{{route('login')}}">Login My Account.</a><br>--}}
                    {{--<a href="{{url('register')}}" class="text-center">Register a new membership</a>--}}
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
@endsection
