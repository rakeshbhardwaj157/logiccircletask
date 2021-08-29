<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function listProduct(){
		$products = Product::all();
        return view('welcome',['products'=>$products]);
    }
	
	
	public function ProductDetail($slug){
		$product = Product::where('slug', $slug)->first();
        return view('product-detail',['product'=>$product]);
    }
}
