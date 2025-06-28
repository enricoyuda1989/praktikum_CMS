<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->start_date ? Carbon::parse($request->start_date) : null;
        $end = $request->end_date ? Carbon::parse($request->end_date)->endOfDay() : null;

        $transactions = Transaction::with(['product', 'product.category', 'supplier'])
            ->when($start && $end, function ($query) use ($start, $end) {
                $query->whereBetween('transaction_date', [$start, $end]);
            })
            ->orderBy('transaction_date', 'desc')
            ->get();

        $products = Product::with(['category', 'supplier'])->get();

        return view('reports.index', compact('transactions', 'products', 'start', 'end'));
    }
}
