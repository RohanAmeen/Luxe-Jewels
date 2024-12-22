<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('web.index',compact( 'products'));
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
        $products = Product::all();

        return view('web.services',compact( 'products'));    }

    
    public function productDetail(Product $product)
    {
        
        return view('web.productDetail', compact('product'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Search for products by name or description
        $products = Product::where('name', 'like', '%' . $query . '%')
                           ->orWhere('description', 'like', '%' . $query . '%')
                           ->get();
    
        return response()->json(['products' => $products]);
    }
    
}
