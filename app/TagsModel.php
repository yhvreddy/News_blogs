<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagsModel extends Model
{
    protected $table = 'tags';
    protected $fillable = ['name','image_link','user_id','status'];
}
