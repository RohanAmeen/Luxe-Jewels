<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
{
    // Fetch all categories
    $categories = Category::all();

    // Pass categories to the view
    return view('admin.category.index', compact('categories'));
}



    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new category
        Category::create($validated);

        // Redirect back to the categories list with a success message
        return redirect()->route('categories.index')->with('success', 'Category added successfully!');

    }


    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the category
        $category->update($validated);

        // Redirect back to the categories list with a success message
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        // Delete the category
        $category->delete();

        // Redirect to the categories index page with success message
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}