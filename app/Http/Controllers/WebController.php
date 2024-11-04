<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    public function shop()
    {
        return view('web.shop');
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
    
    public function productDetail()
    {
        return view('web.productDetail');
    }
}
