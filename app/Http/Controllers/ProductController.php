<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sortOrder = $request->query('sort', 'asc');
        $products = Product::with(['category', 'supplier'])->orderBy('category_id', $sortOrder)->get();
        $totalProducts = $products->count();

        Log::info('Menampilkan halaman index produk');

        return view('products.index', compact('products', 'totalProducts', 'sortOrder'));
    }

   public function show($id)
    {
    try {
        $product = Product::with(['category', 'supplier', 'image'])->findOrFail($id);
        \Log::info('Menampilkan produk', ['product_id' => $id]);
    } catch (ModelNotFoundException $e) {
        \Log::error('Produk tidak ditemukan saat show', ['product_id' => $id, 'message' => $e->getMessage()]);
        abort(404);
    }

    return view('products.show', compact('product'));
    }

    public function create()
    {
    $categories = \App\Models\Category::all();
    $suppliers = \App\Models\Supplier::all();

    Log::info('Menampilkan form tambah produk');

    return view('products.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Nama wajib diisi!',
            'category_id.required' => 'Kategori wajib diisi!',
            'supplier_id.required' => 'Supplier wajib diisi!',
            'stock.required' => 'Stok wajib diisi!',
            'stock.numeric' => 'Stok harus berupa angka!',
            'price.required' => 'Harga wajib diisi!',
            'price.numeric' => 'Harga harus berupa angka!',
            'description.required' => 'Deskripsi wajib diisi!',
            'images.*.image' => 'File harus berupa gambar.',
            'images.*.mimes' => 'Gambar harus berformat jpeg, png, jpg, gif, atau svg.',
            'images.*.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        try {
            $product = Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'stock' => $request->stock,
                'price' => $request->price,
                'description' => $request->description,
            ]);

            Log::info('Produk berhasil ditambahkan', ['product_id' => $product->id]);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('uploads', 'public');

                Image::create([
                    'title' => $request->name,
                    'image_path' => $imagePath,
                    'product_id' => $product->id,
                ]);

                Log::info('Gambar produk berhasil diupload', ['product_id' => $product->id]);
            }

        } catch (\Exception $e) {
            Log::error('Gagal menambahkan produk', ['message' => $e->getMessage()]);
            return back()->withErrors('Terdapat kesalahan saat menambahkan produk.');
        }

        return redirect()->route('products.index')->with('success', 'Barang berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
    try {
        $product = Product::findOrFail($id);
        Log::info('Menampilkan form edit produk', ['product_id' => $id]);
    } catch (ModelNotFoundException $e) {
        Log::error('Produk tidak ditemukan saat edit()', ['product_id' => $id, 'message' => $e->getMessage()]);
        abort(404);
    }

        $categories = \App\Models\Category::all();
        $suppliers = \App\Models\Supplier::all();

        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }


    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'category_id' => 'required|exists:categories,id',
        'supplier_id' => 'required|exists:suppliers,id',
        'stock' => 'required|numeric',
        'price' => 'required|numeric',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ], [
        'name.required' => 'Nama wajib diisi!',
        'category_id.required' => 'Kategori wajib diisi!',
        'supplier_id.required' => 'Kategori wajib diisi!',
        'stock.required' => 'Stok wajib diisi!',
        'stock.numeric' => 'Stok harus berupa angka!',
        'price.required' => 'Harga wajib diisi!',
        'price.numeric' => 'Harga harus berupa angka!',
        'description.required' => 'Deskripsi wajib diisi!',
        'images.*.image' => 'File harus berupa gambar.',
        'images.*.mimes' => 'Gambar harus berformat jpeg, png, jpg, gif, atau svg.',
        'images.*.max' => 'Ukuran gambar maksimal 2MB.',
    ]);

    try {
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        Log::info('Produk berhasil diperbarui', ['product_id' => $id]);

    if ($request->hasFile('image')) {
    $imageFile = $request->file('image');
    $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
    $imageFile->move(public_path('uploads'), $imageName);

$image = Image::where('product_id', $id)->first();
    if ($image) {
        // (Opsional) hapus file lama
        if (file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }

        $image->update([
            'title' => $request->name,
            'image_path' => 'uploads/' . $imageName,
        ]);
    } else {
        Image::create([
            'title' => $request->name,
            'image_path' => 'uploads/' . $imageName,
            'product_id' => $id,
        ]);
    }
    Log::info('Gambar produk berhasil diperbarui', ['product_id' => $id]);
}


    } catch (ModelNotFoundException $e) {
        Log::error('Produk tidak ditemukan saat update()', ['product_id' => $id, 'message' => $e->getMessage()]);
        abort(404);
    }

    return redirect()->route('products.show', $id)->with('success', 'Barang berhasil diperbarui');
}


    public function confirmDelete($id)
{
    try {
        $product = Product::with(['category', 'supplier', 'image'])->findOrFail($id);
        Log::info('Menampilkan halaman konfirmasi delete', ['product_id' => $id]);
    } catch (ModelNotFoundException $e) {
        Log::error('Produk tidak ditemukan saat confirmDelete()', ['product_id' => $id, 'message' => $e->getMessage()]);
        abort(404);
    }

    return view('products.confirmdelete', compact('product'));
}


    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            Log::info('Produk berhasil dihapus', ['product_id' => $id]);
        } catch (ModelNotFoundException $e) {
            Log::error('Produk tidak ditemukan saat destroy()', ['product_id' => $id, 'message' => $e->getMessage()]);
            abort(404);
        }

        return redirect()->route('products.index')->with('success', 'Barang berhasil dihapus');
    }
}