<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    public function shop()
    {
        $products = Product::all();
        return view("web.shop", compact( 'products'));
    }

    public function about()
    {
        return view('web.about');
    }

    public function blog()
    {
        return view('web.blog');
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function services()
    {
        return view('web.services');
    }

    public function cart()
    {
        return view('web.cart');
    }
    
    public function productDetail(Product $product)
    {
        return view('web.productDetail', compact('product'));
    }
}
