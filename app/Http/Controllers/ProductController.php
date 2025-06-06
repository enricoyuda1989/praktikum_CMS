<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

class ProductController extends Controller
{
    public function index(Request $request)
    {
    $sortOrder = $request->query('sort', 'asc');
    $products = Product::with(['category', 'supplier'])->orderBy('category_id', $sortOrder)->get();
    $totalProducts = $products->count();

    return view('products.index', compact('products', 'totalProducts', 'sortOrder'));
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
        'category_id' => 'required|numeric',
        'supplier_id' => 'required|numeric',
        'stock' => 'required|numeric',
        'price' => 'required|numeric',
        'description' => 'required',
    ], [
        'name.required' => 'Nama wajib diisi!',
        'category_id.required' => 'Kategori wajib diisi!',
        'supplier_id.required' => 'Kategori wajib diisi!',
        'stock.required' => 'Stok wajib diisi!',
        'stock.numeric' => 'Stok harus berupa angka!',
        'price.required' => 'Harga wajib diisi!',
        'price.numeric' => 'Harga harus berupa angka!',
        'description.required' => 'Deskripsi wajib diisi!',
        'numeric' => 'Nilai pada kolom :attribute harus berupa angka.',
    ]);

    Product::create($request->all());

    return redirect()->route('products.index')->with('success', 'Barang berhasil ditambahkan.');
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
            'category_id' => 'required|numeric',
            'supplier_id' => 'required|numeric',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi!',
            'category_id.required' => 'Kategori wajib diisi!',
            'supplier_id.required' => 'Kategori wajib diisi!',
            'stock.required' => 'Stok wajib diisi!',
            'stock.numeric' => 'Stok harus berupa angka!',
            'price.required' => 'Harga wajib diisi!',
            'price.numeric' => 'Harga harus berupa angka!',
            'description.required' => 'Deskripsi wajib diisi!',
            'numeric' => 'Nilai pada kolom :attribute harus berupa angka.',
        ]);
    
        $product = Product::find($id);
        $product->update($request->all());
    
        return redirect()->route('products.show', $id)->with('success', 'Barang berhasil diperbarui');
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

        return redirect()->route('products.index')->with('success', 'Barang berhasil dihapus');
    }
}
