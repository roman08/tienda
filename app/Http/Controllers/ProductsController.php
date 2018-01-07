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
    	dd($id);
    }
}
