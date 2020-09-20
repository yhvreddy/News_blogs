<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ForgetPasswordRequests extends Model
{
    protected $table = 'forget_password_requests';
    protected $fillable = ['email','_token','status','updated_at'];
}
