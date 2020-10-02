<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PreDefinedController as preDefiendFun;
use Illuminate\Http\Request;
use App\CategoriesModel as Categories;
use Illuminate\Support\Facades\Auth;
use App\SubCategoriesModel as SubCategories;

class CategoriesController extends Controller
{
    //Constructor
    public function __construct(){
        $this->preDefiend = new preDefiendFun();
    }

    //Categories page
    public function index(Request $request)
    {
        $categories = Categories::where('status',1)->get();
        return view('categories.categories', compact('categories'));
    }

    //Save Category data
    public function saveCategoryData(Request $request)
    {
        $request->validate([
            'name' => 'required:max:185',
            'icon' => 'required|mimes:jpg,jpeg,svg,png|max:4056'
        ]);
        if($request->file()):
            try {
                $uploadFile = $this->preDefiend->uploadFile($request,'icon','categories');
                $save = Categories::create(['name'=>$request->name,'image_link'=>$uploadFile,'user_id'=>Auth::user()->id])->id;
                if($save > 0){
                    return redirect()->back()->with('success',ucfirst($request->name).' category as saved successfully.');
                }else{
                    if(file_exists($uploadFile)){ unlink($uploadFile); }
                    return redirect()->back()->with('failed','Failed to save category details.');
                }
            }catch (\Exception $exception){
                return redirect()->back()->with('warning','Unable to save category details or Invalid file upload.');
            }
        else:
            return redirect()->back()->with('warning','Invalid file upload.');
        endif;
    }

    //get SubCategories List
    public function getSubCategoriesList(Request $request)
    {
        $subCategories = SubCategories::where(['status'=>1,'category_id'=>$request->category_id])->get();
        if (count($subCategories) > 0):
            return response()->json(['code'=>true,'data'=>$subCategories]);
        else:
            return response()->json(['code'=>false,'data'=>$subCategories]);
        endif;
    }
}
