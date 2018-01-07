<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
class ProductsController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(9);
    	return view('welcome')->with(compact('products'));
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
