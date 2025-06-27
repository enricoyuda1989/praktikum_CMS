<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
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

        Supplier::create($request->only(['name', 'contact', 'address']));
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.show', compact('supplier'));
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
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

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->only(['name', 'contact', 'address']));

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus.');
    }

    public function confirmDelete($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.confirmdelete', compact('supplier'));
    }

}
