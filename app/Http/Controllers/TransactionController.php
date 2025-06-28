<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

class TransactionController extends Controller
{
    public function index()
{
    $transactions = Transaction::with(['product', 'category', 'supplier'])->latest()->get();
    return view('transactions.index', compact('transactions'));
}

public function create()
{
    $products = Product::all();
    $suppliers = Supplier::all();
    return view('transactions.create', compact('products', 'suppliers'));
}

public function store(Request $request)
{
    $request->validate([
        'transaction_date' => 'required|date',
        'type' => 'required|in:in,out',
        'product_id' => 'required|exists:products,id',
        'supplier_id' => 'nullable|exists:suppliers,id',
        'quantity' => 'required|integer|min:1',
        'notes' => 'nullable|string',
    ]);

    $product = Product::findOrFail($request->product_id);

    if ($request->type === 'out' && $product->stock < $request->quantity) {
        return back()->withErrors(['quantity' => 'Stok produk tidak mencukupi untuk transaksi keluar.'])->withInput();
    }

    $transaction = Transaction::create([
        'transaction_date' => $request->transaction_date,
        'type' => $request->type,
        'product_id' => $request->product_id,
        'supplier_id' => $request->supplier_id,
        'quantity' => $request->quantity,
        'notes' => $request->notes,
    ]);

    if ($request->type === 'in') {
        $product->stock += $request->quantity;
    } else {
        $product->stock -= $request->quantity;
    }
    $product->save();

    return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan!');
}


}
