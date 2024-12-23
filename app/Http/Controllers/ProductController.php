<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    // Display all products in the admin view
    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('admin.products.index', compact('products'));
    }

    // Show the form for creating a new product
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // Store a newly created product in the database
    public function store(Request $request)
    {
        $product = $this->productService->createProduct($request);
        return redirect()->route('dashboard')->with('success', 'Product created successfully');
    }

    // Show the form for editing a product
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Update the product in the database
    public function update(Request $request, Product $product)
    {
        $updatedProduct = $this->productService->updateProduct($request, $product);
        return redirect()->route('dashboard')->with('success', 'Product updated successfully');
    }

    // Show a specific product view
    public function show(Product $product)
    {
        return view('admin.products.view', compact('product'));
    }

    // Delete a product from the database
    public function destroy(Product $product)
    {
        $this->productService->deleteProduct($product);
        return redirect()->route('dashboard')->with('success', 'Product deleted successfully');
    }
}
