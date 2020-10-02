<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostSourceModel extends Model
{
    protected $table = 'posts_source';
    protected $fillable = ['post_id','type','title','source'];
}
