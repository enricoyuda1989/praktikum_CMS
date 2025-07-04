<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        Log::info('Menampilkan halaman index kategori');
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        Log::info('Menampilkan form create kategori');
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            $category = Category::create($request->only(['name', 'description']));
            Log::info('Kategori berhasil dibuat', ['category_id' => $category->id]);
        } catch (\Exception $e) {
            Log::error('Gagal membuat kategori', ['message' => $e->getMessage()]);
            return back()->withErrors('Terjadi kesalahan saat membuat kategori.');
        }

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show($id)
    {
        try {
            $category = Category::findOrFail($id);
            Log::info('Menampilkan detail kategori', ['category_id' => $id]);
        } catch (ModelNotFoundException $e) {
            Log::error('Kategori tidak ditemukan saat show()', ['category_id' => $id, 'message' => $e->getMessage()]);
            abort(404);
        }

        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
            Log::info('Menampilkan form edit kategori', ['category_id' => $id]);
        } catch (ModelNotFoundException $e) {
            Log::error('Kategori tidak ditemukan saat edit()', ['category_id' => $id, 'message' => $e->getMessage()]);
            abort(404);
        }

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            $category = Category::findOrFail($id);
            $category->update($request->only(['name', 'description']));
            Log::info('Kategori berhasil diperbarui', ['category_id' => $id]);
        } catch (ModelNotFoundException $e) {
            Log::error('Kategori tidak ditemukan saat update()', ['category_id' => $id, 'message' => $e->getMessage()]);
            abort(404);
        }

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            Log::info('Kategori berhasil dihapus', ['category_id' => $id]);
        } catch (ModelNotFoundException $e) {
            Log::error('Kategori tidak ditemukan saat destroy()', ['category_id' => $id, 'message' => $e->getMessage()]);
            abort(404);
        }

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

    public function confirmDelete($id)
    {
        try {
            $category = Category::findOrFail($id);
            Log::info('Menampilkan halaman konfirmasi delete kategori', ['category_id' => $id]);
        } catch (ModelNotFoundException $e) {
            Log::error('Kategori tidak ditemukan saat confirmDelete()', ['category_id' => $id, 'message' => $e->getMessage()]);
            abort(404);
        }

        return view('categories.confirmdelete', compact('category'));
    }
}