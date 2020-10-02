<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsModel extends Model
{
    protected $table = 'posts';
    protected $fillable = ['category_id','subcategory_id','title','cover_image','summary','content','status','publish_status','created_by','updated_by'];
    /*
     * Publish_status of posts
     * 1-Not Publish, 2-Send To Editor, 3-Send To Publisher, 4-Publish, 5-Resend back
     */
}
