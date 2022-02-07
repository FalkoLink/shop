<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function categories($section){
        $section = Category::where('slug', $section)->first();
        $products = new Collection();
        foreach($section->children as $child){
            $products = $products->merge($child->childrenProducts);
        }
        return view('category', compact('section','products'));
    }

    public function category($section, $category){
        $section = Category::where('slug', $section)->first();
        $category = Category::where('slug', $category)->first();
        $products = $category->products()->get();
        return view('category', compact('section', 'category', 'products'));
    }

    public function product($section, $category, $product){
        $section = Category::where('slug', $section)->first();
        $category = Category::with('products')->where('slug', $category)->first();
        $product = $category->products()->where('slug', $product)->first();
//        dd($product);

        return view('product', compact('section', 'category'));
    }
}
