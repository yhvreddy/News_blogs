<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PreDefinedController as PreDefiendFun;


class DashboardController extends Controller
{
    public function __construct(){
        $this->preDefiend = new PreDefiendFun();
    }

    public function dashboardPage(Request $request)
    {
        $userStatus = $this->preDefiend->checkUserStatusOnOff(Auth::user()->id);
        return view('dashboard.dashboard', compact('userStatus'));
    }
}
