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
        if (!$product) abort(404);
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
        'category' => 'required',
        'stock' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable'
    ]);

    Product::create($request->only(['name', 'category', 'stock', 'price', 'description']));
    return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) abort(404);
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
    $request->validate([
        'name' => 'required',
        'category' => 'required',
        'stock' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable'
    ]);

    $data = $request->only(['name', 'category', 'stock', 'price', 'description']);

    \App\Models\Product::update($id, $data);

    return redirect()->route('products.show', $id)->with('success', 'Produk berhasil diperbarui!');
    }


    public function confirmDelete($id)
    {
    $product = Product::find($id);
    if (!$product) {
        return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan!');
    }

    return view('products.confirmDelete', compact('product'));
    }

    
    public function destroy($id)
    {
    Product::delete($id);
    return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }


}
