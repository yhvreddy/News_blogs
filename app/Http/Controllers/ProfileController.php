<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PreDefinedController as preDefiendFun;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    //Constructor
    public function __construct(){
        $this->preDefiend = new preDefiendFun();
    }

    public function userProfile(Request $request)
    {
        $user = User::select('users.*','roles.name as role_name')->join('roles','users.role','=','roles.id')->where('users.id',Auth::user()->id)->first();
        return view('users.profile', compact('user'));
    }
}
