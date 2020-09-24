<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoriesModel extends Model
{
    protected $table = 'subcategories';
    protected $fillable = ['name','category_id','user_id','status'];
}
