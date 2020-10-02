<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PreDefinedController as preDefiendFun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\RolesModel as Roles;


class RolesController extends Controller
{
    //Constructor
    public function __construct(){
        $this->preDefiend = new preDefiendFun();
    }

    public function roles(Request $request)
    {
        $roles = Roles::get();
        return view('masterdata.roles', compact('roles'));
    }
}
