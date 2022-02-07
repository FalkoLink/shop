<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function values(){
        return $this->belongsToMany(Value::class);
    }

    public function rating(){
        return $this->belongsToMany(User::class,'rating')->withPivot('rate');
    }

    public function getRating(){
        for($i=0,$rate=0; $i < count($this->rating);$i++) {
            $rate += $this->rating[$i]->pivot->rate;
        }
        if($i == 0){
            return 0;
        }

        $rating = round($rate/$i,1);

        return $rating;
    }
}
