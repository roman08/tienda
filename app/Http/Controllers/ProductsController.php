<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class ProductsController extends Controller
{
    public function index()
    {
    	$categories = Category::has('products')->get();
    	return view('welcome')->with(compact('categories'));
    }

    public function show($id)
    {
    	$product = Product::find($id);
    	$images = $product->images;

    	$imagesLeft = collect();
    	$imagesRight = collect();

    	foreach ($images as $key => $image) {
    		if($key%2 == 0)
    			$imagesLeft->push($image);
    		else
    			$imagesRight->push($image);

    	}
    	return view('products.show')->with(compact('product','imagesLeft','imagesRight'));
    }
}
