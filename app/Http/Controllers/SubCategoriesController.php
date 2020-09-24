<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PreDefinedController as preDefiendFun;
use Illuminate\Http\Request;
use App\CategoriesModel as Categories;
use App\SubCategoriesModel as SubCategories;
use Illuminate\Support\Facades\Auth;

class SubCategoriesController extends Controller
{
    //Constructor
    public function __construct(){
        $this->preDefiend = new preDefiendFun();
    }

    //SubCategory
    public function index(Request $request)
    {
        $categories =   Categories::where('status',1)->get();
        $subCategories = SubCategories::select('subcategories.*','categories.name as category_name')->leftJoin('categories',function ($join){
            $join->on('subcategories.category_id','=','categories.id');
        })->where('subcategories.status',1)->orderBy('subcategories.created_at','DESC')->get();
        return view('subcategories.subcategories',compact('categories','subCategories'));
    }

    //save subcategory data
    public function saveSubCategoryData(Request $request)
    {
        $request->validate([
            'name' => 'required:max:185|string',
            'category_id' => 'required'
        ]);
        if (isset($request->category_id) && isset($request->name)):
            try {
                $save = SubCategories::create(['name'=>$request->name,'category_id'=>$request->category_id,'user_id'=>Auth::user()->id])->id;
                if($save > 0):
                    return redirect()->back()->with('success',$request->name.' subcategory as successfully saved.');
                else:
                    return redirect()->back()->with('failed','Failed to save subcategory data.');
                endif;
            }catch (\Exception $exception){
                return redirect()->back()->with('warning','Unable to save subcategory details');
            }
        else:
            return redirect()->back()->with('warning','Invalid request to save subcategory details');
        endif;
    }
}
