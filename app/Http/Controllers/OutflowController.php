<?php

namespace App\Http\Controllers;

use App\Models\Outflow;
use Illuminate\Http\Request;

class OutflowController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
        $search = $request->input('search');

        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        $years = [];

        $period = 'Semua Periode';
        if ($month && $year) {
            $period = $months[$month] . ' ' . $year;
        } elseif ($month) {
            $period = $months[$month];
        } elseif ($year) {
            $period = (string) $year;
        }

        $outflows = Outflow::get();

        $total = $outflows->sum(fn ($item) => $item->quantity * $item->harga_satuan);

        return view('admin.Outflow.cash_outflow', compact('outflows', 'total', 'years', 'months', 'month', 'year', 'search', 'period'));
    }

    public function store(Request $request){

        $request->validate([
            'item_jenis_barang' => 'required|string',
            'quantity' => 'required|integer',
            'harga_satuan' => 'required|numeric',
            'tanggal_pembelian' => 'required|date',
        ]);

        Outflow::create([
            'item_jenis_barang' => $request->item_jenis_barang,
            'quantity' => $request->quantity,
            'harga_satuan' => $request->harga_satuan,
            'tanggal_pembelian' => $request->tanggal_pembelian,
        ]);

        return back()->with('success', 'Outflow data has been added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_jenis_barang' => 'required|string',
            'quantity' => 'required|integer',
            'harga_satuan' => 'required|numeric',
            'tanggal_pembelian' => 'required|date',
        ]);

        $outflow = Outflow::findOrFail($id);
        $outflow->update([
            'item_jenis_barang' => $request->item_jenis_barang,
            'quantity' => $request->quantity,
            'harga_satuan' => $request->harga_satuan,
            'tanggal_pembelian' => $request->tanggal_pembelian,
        ]);

        return redirect()->route('outflow.index')->with('success', 'Outflow data has been updated successfully.');
    }

    public function destroy($id)
    {
        $outflow = Outflow::findOrFail($id);
        $outflow->delete();

        return redirect()->route('outflow.index')->with('success', 'Outflow data has been deleted successfully.');
    }
}
