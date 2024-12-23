<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    // Fetch all products with category details (API)
    public function index()
    {
        $products = $this->productService->getAllProducts();
        return response()->json($products);
    }

    // Store a new product (API)
    public function store(Request $request)
    {
        $product = $this->productService->createProduct($request);
        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }

    // Show a specific product by ID (API)
    public function show($id)
    {
        $product = $this->productService->getProductById($id);
        return response()->json($product);
    }

    // Update a product (API)
    public function update(Request $request, $id)
    {
        $product = $this->productService->getProductById($id);
        $updatedProduct = $this->productService->updateProduct($request, $product);
        return response()->json(['message' => 'Product updated successfully', 'product' => $updatedProduct]);
    }

    // Delete a product (API)
    public function destroy($id)
    {
        $product = $this->productService->getProductById($id);
        $this->productService->deleteProduct($product);
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
