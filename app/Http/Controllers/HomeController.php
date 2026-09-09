<?php

namespace App\Http\Controllers;

use App\Models\Inflow;
use App\Models\Outflow;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $inflowByDay = Inflow::whereBetween('tanggal_masuk', [$startOfMonth, $endOfMonth])
            ->get()
            ->groupBy(fn ($item) => Carbon::parse($item->tanggal_masuk)->day)
            ->map(fn ($group) => (float) $group->sum('nominal'));

        $outflowByDay = Outflow::whereBetween('tanggal_pembelian', [$startOfMonth, $endOfMonth])
            ->get()
            ->groupBy(fn ($item) => Carbon::parse($item->tanggal_pembelian)->day)
            ->map(fn ($group) => (float) $group->sum(fn ($item) => $item->quantity * $item->harga_satuan));

        $chartCategories = [];
        $inflowChart = [];
        $outflowChart = [];
        for ($day = 1; $day <= $endOfMonth->day; $day++) {
            $chartCategories[] = $day;
            $inflowChart[] = $inflowByDay->get($day, 0);
            $outflowChart[] = $outflowByDay->get($day, 0);
        }

        return view('admin.home', compact(
            'totalInflow', 'totalOutflow', 'sisaSaldo', 'lastPurchases',
            'chartCategories', 'inflowChart', 'outflowChart'
        ));
    }
}
