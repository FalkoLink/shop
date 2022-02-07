<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    function categories(){
        return $this->belongsToMany(Category::class);
    }

    function attribute(){
        return $this->belongsTo(Attribute::class);
    }

    function products(){
        return $this->belongsToMany(Product::class);
    }
}
