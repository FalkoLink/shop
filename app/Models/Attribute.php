<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    function categories(){
        return $this->belongsToMany(Category::class);
    }

    function values(){
        return $this->hasMany(Value::class);
    }
}
