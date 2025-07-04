<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        Log::info('Menampilkan daftar supplier');
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        Log::info('Menampilkan form tambah supplier');
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => ['nullable', 'regex:/^08[0-9]{8,11}$/'],
            'address' => 'nullable|string',
        ], [
            'contact.regex' => 'Nomor HP harus dimulai dengan 08 dan terdiri dari 10–13 digit angka tanpa spasi atau simbol.',
        ]);

        try {
            $supplier = Supplier::create($request->only(['name', 'contact', 'address']));
            Log::info('Supplier berhasil ditambahkan', ['supplier_id' => $supplier->id]);
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan supplier', ['message' => $e->getMessage()]);
            return back()->withErrors('Terjadi kesalahan saat menambahkan supplier.');
        }

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function show($id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            Log::info('Menampilkan detail supplier', ['supplier_id' => $id]);
        } catch (ModelNotFoundException $e) {
            Log::error('Supplier tidak ditemukan saat show()', ['supplier_id' => $id, 'message' => $e->getMessage()]);
            abort(404);
        }

        return view('suppliers.show', compact('supplier'));
    }

    public function edit($id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            Log::info('Menampilkan form edit supplier', ['supplier_id' => $id]);
        } catch (ModelNotFoundException $e) {
            Log::error('Supplier tidak ditemukan saat edit()', ['supplier_id' => $id, 'message' => $e->getMessage()]);
            abort(404);
        }

        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => ['nullable', 'regex:/^08[0-9]{8,11}$/'],
            'address' => 'nullable|string',
        ], [
            'contact.regex' => 'Nomor HP harus dimulai dengan 08 dan terdiri dari 10–13 digit angka tanpa spasi atau simbol.',
        ]);

        try {
            $supplier = Supplier::findOrFail($id);
            $supplier->update($request->only(['name', 'contact', 'address']));
            Log::info('Supplier berhasil diperbarui', ['supplier_id' => $id]);
        } catch (ModelNotFoundException $e) {
            Log::error('Supplier tidak ditemukan saat update()', ['supplier_id' => $id, 'message' => $e->getMessage()]);
            abort(404);
        }

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            $supplier->delete();
            Log::info('Supplier berhasil dihapus', ['supplier_id' => $id]);
        } catch (ModelNotFoundException $e) {
            Log::error('Supplier tidak ditemukan saat destroy()', ['supplier_id' => $id, 'message' => $e->getMessage()]);
            abort(404);
        }

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus.');
    }

    public function confirmDelete($id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            Log::info('Menampilkan halaman konfirmasi delete supplier', ['supplier_id' => $id]);
        } catch (ModelNotFoundException $e) {
            Log::error('Supplier tidak ditemukan saat confirmDelete()', ['supplier_id' => $id, 'message' => $e->getMessage()]);
            abort(404);
        }

        return view('suppliers.confirmdelete', compact('supplier'));
    }
}