<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['product', 'product.category', 'supplier'])
            ->orderBy('transaction_date', 'desc')
            ->get();

        // Gunakan nilai 'in' dan 'out' seperti di halaman laporan
        $totalTransaksiMasuk = $transactions->where('type', 'in')->count();
        $totalTransaksiKeluar = $transactions->where('type', 'out')->count();
        $latestTransaksiMasuk = $transactions->where('type', 'in')->take(5);
        $latestTransaksiKeluar = $transactions->where('type', 'out')->take(5);

        $totalStock = Product::sum('stock');
        $totalProduk = Product::count();
        $totalCategory = Category::count();
        $totalSupplier = Supplier::count();

        return view('dashboard.index', compact(
            'totalTransaksiMasuk',
            'totalTransaksiKeluar',
            'totalStock',
            'totalProduk',
            'totalCategory',
            'totalSupplier',
            'latestTransaksiMasuk',
            'latestTransaksiKeluar'
        ));
    }
}
