<?php

namespace App\Http\Controllers;

use App\Models\Inflow;
use App\Models\Outflow;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $totalInflow = Inflow::sum('nominal');
        $totalOutflow = Outflow::get()->sum(fn ($item) => $item->quantity * $item->harga_satuan);
        $sisaSaldo = $totalInflow - $totalOutflow;

        $lastPurchases = Outflow::orderBy('tanggal_pembelian', 'desc')->take(5)->get();

        return view('admin.home', compact('totalInflow', 'totalOutflow', 'sisaSaldo', 'lastPurchases'));
    }
}
