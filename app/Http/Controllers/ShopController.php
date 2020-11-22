<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $categories =   Category::all();
        if (request()->category) {
            $categoryName = Category::where('slug', request()->category)->first()->name;
            $products = Product::where('slug','like', "%".request()->category."%")->get();

        } else {
            $categoryName = 'Featured';
            $products = Product::all();

        }

        return view('shop', compact('categories', 'products', 'categoryName'));
    }
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
       return view('product', compact('product'));

    }
}
