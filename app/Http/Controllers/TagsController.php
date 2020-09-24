<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PreDefinedController as preDefiendFun;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    //Constructor
    public function __construct(){
        $this->preDefiend = new preDefiendFun();
    }

    public function index(Request $request)
    {

    }
}
