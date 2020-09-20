@extends('layouts.app_auth')
@section('pageTitle','Register Account')
@section('authSession')
    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="{{route('register.saveSetupAccount')}}" id="saveSetupAccount" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" required placeholder="Full name *">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" required placeholder="Email *">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input type="tel" name="mobile" class="form-control" required placeholder="Mobile *">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                @error('mobile')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" required placeholder="password *">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-8" style="padding-top: 8px">
                    <a href="{{url('login')}}" class="text-center"> {{_('I already have account.!')}} </a>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"> {{ _('Register')  }} </button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
@endsection
