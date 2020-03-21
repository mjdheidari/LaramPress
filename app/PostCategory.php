<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    public $timestamps = false;
    protected $fillable=['parent','title'];
    protected $guarded = [];

    public function subcategory(){

        return $this->hasMany(PostCategory::class, 'parent');

    }
}
