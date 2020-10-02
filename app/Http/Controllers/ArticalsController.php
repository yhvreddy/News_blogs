<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PreDefinedController as preDefiendFun;
use Illuminate\Contracts\Encryption\EncryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CategoriesModel as Categories;
Use App\TagsModel as Tags;
Use App\PostsModel as Posts;
Use App\PostSourceModel as PostSource;
Use App\PostTagsModel as PostTags;

class ArticalsController extends Controller
{
    //Constructor
    public function __construct(){
        $this->preDefiend = new preDefiendFun();
    }

    public function index(Request $request)
    {
        $roleName = $this->preDefiend->getRoleName(Auth::user()->role);
        $posts = Posts::select('posts.*','publish_status_identity.name as psi_name')->leftJoin('publish_status_identity',function ($join){
            $join->on('publish_status_identity.id','=','posts.publish_status');
        })->where(function ($query){
            //SuperAdmin or Admin
            if(Auth::user()->role == 1 || Auth::user()->role == 2):

            endif;
            //Editor
            if(Auth::user()->role == 3):
                $query->where('posts.status',1);
            endif;
            //Publisher
            if(Auth::user()->role == 4):
                $query->where('posts.status',1);
            endif;
            //Reporter or Public Reporter
            if(Auth::user()->role == 5 || Auth::user()->role == 6):
                $query->where('posts.status',1);
            endif;
        })->orderBy('posts.id','DESC')->get();
        return view('posts.posts_list',compact('roleName','posts'));
    }

    public function addNewPost(Request $request)
    {
        $categories = Categories::where('status',1)->get();
        $tags = Tags::where('status', 1)->orderBy('created_at','DESC')->get();
        $roleName = $this->preDefiend->getRoleName(Auth::user()->role);
        return view('posts.posts_add', compact('categories','tags','roleName'));
    }

    public function appendNewPostSource(Request $request)
    {
        $id = $request->id;
        return view('posts.posts_source_append',compact('id'));
    }

    public function savePostData(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'content' => 'required',
            'title' => 'required:max:180',
            'summary' => 'required:max:225',
            'coverImage' => 'required|mimes:jpg,jpeg,svg,png|max:4056'
        ]);

        //dd($request->all());
        if(isset($request->title) && isset($request->summary) && isset($request->content)):
            try {
                $coverImage = $this->preDefiend->uploadFile($request,'coverImage','posts/coverImages');
                //Post Details
                $saveData = Posts::create(['category_id'=>$request->category,'subcategory_id'=>$request->subcategory,'title'=>$request->title,'cover_image'=>$coverImage,'summary'=>$request->summary,'content'=>$request->content,'status'=>1,'publish_status'=>1,'created_by'=>Auth::user()->id,'updated_by'=>Auth::user()->id])->id;
                if($saveData > 0):
                    //Tags
                    if(isset($request->tags) && count($request->tags) > 0):
                        foreach ($request->tags as $key => $tag):
                            PostTags::create(['post_id'=>$saveData,'tag_id'=>$tag]);
                        endforeach;
                    endif;
                    //Source
                    if(isset($request->sourceUrlsTitle)):
                        foreach ($request->sourceUrlsTitle as $key => $value):
                            if(isset($request->sourceUrls[$key])):
                                $source = ['post_id'=>$saveData,'type'=>'urls','title'=>$value,'source'=>$request->sourceUrls[$key]];
                                PostSource::create($source);
                            endif;
                        endforeach;
                    endif;
                    if(isset($request->sourceFilesTitle)):
                        $sourceFiles = $this->preDefiend->multiUploads($request,'sourceFiles','posts/sourceFiles');
                        foreach ($request->sourceFilesTitle as $key => $value):
                            if(isset($sourceFiles[$key])):
                                $source = ['post_id'=>$saveData,'type'=>'files','title'=>$value,'source'=>$sourceFiles[$key]];
                                PostSource::create($source);
                            endif;
                        endforeach;
                    endif;

                    $getRoleName = $this->preDefiend->getRoleName(Auth::user()->role);
                    return redirect()->route('posts.list',['role'=>strtolower(urlencode($getRoleName->role_name))])->with('success','Post details as successfully saved.');
                else:
                    return redirect()->back()->with('failed','Post details are not saved. try again with valid format data.');
                endif;
            }catch (EncryptException $exception){
                return redirect()->back()->with('warning','Please submit valid format data.');
            }
        else:
            return redirect()->back()->with('warning','Please fill all mandatory * required fields.');
        endif;
    }
}
