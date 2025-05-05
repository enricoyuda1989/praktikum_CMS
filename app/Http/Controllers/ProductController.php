<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $product = Product::find($id);
        $product->update($request->all());

        return redirect()->route('products.index');
    }

    public function confirmDelete($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        return view('products.confirmDelete', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
