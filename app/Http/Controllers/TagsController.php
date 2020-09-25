<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PreDefinedController as preDefiendFun;
use Illuminate\Http\Request;
Use App\TagsModel as Tags;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
    //Constructor
    public function __construct(){
        $this->preDefiend = new preDefiendFun();
    }

    public function index(Request $request)
    {
        $tags = Tags::where('status', 1)->orderBy('created_at','DESC')->get();
        return view('tags.tags', compact('tags'));
    }

    public function saveTagData(Request $request)
    {
        if (isset($request->name)):
            try {
                $save = Tags::create(['name'=>$request->name,'user_id'=>Auth::user()->id])->id;
                if ($save > 0):
                    return redirect()->back()->with('success','Tag as successfully saved.');
                else:
                    return redirect()->back()->with('failed','Failed to save tag');
                endif;
            }catch (\Exception $exception){
                return redirect()->back()->with('warning','Invalid request to save tag.');
            }
        else:
            return redirect()->back()->with('warning','Enter valid data and try again.');
        endif;
    }
}
