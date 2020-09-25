<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PreDefinedController as preDefiendFun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticalsController extends Controller
{
    //Constructor
    public function __construct(){
        $this->preDefiend = new preDefiendFun();
    }

    public function index(Request $request)
    {
        $roleName = $this->preDefiend->getRoleName(Auth::user()->role);
        return view('posts.posts_list',compact('roleName'));
    }

    public function addNewPost(Request $request)
    {
        return view('posts.posts_add');
    }

    public function appendNewPostSource(Request $request)
    {
        $id = $request->id;
        return view('posts.posts_source_append',compact('id'));
    }
}
