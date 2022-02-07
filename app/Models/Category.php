<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    public function children(){
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function childrenProducts()
    {
        return $this->hasManyThrough(Product::class, Category::class, 'parent_id', 'category_id', 'id');
    }

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function attributes(){
        return $this->belongsToMany(Attribute::class);
    }
}
