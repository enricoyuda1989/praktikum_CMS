<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    Category::create($request->only(['name', 'description']));
    return redirect()->route('categories.index')->with('success', 'Category created successfully.');
}

public function show($id)
{
    try {
        $category = Category::findOrFail($id);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        abort(404);
    }
    return view('categories.show', compact('category'));
}

public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('categories.edit', compact('category'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $category = Category::findOrFail($id);
    $category->update($request->only(['name', 'description']));

    return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
}

public function destroy($id)
{
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
}

public function confirmDelete($id)
{
    $category = Category::findOrFail($id);
    return view('categories.confirmdelete', compact('category'));
}
}

