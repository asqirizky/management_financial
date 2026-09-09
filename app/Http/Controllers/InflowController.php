<?php

namespace App\Http\Controllers;

use App\Models\Inflow;
use Illuminate\Http\Request;

class InflowController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? now()->month;
        $tahun = $request->tahun ?? now()->year;
        $search = $request->input('search');

        $query = Inflow::query();

        if ($bulan) {
            $query->whereMonth('tanggal_masuk', $bulan);
        }

        if ($tahun) {
            $query->whereYear('tanggal_masuk', $tahun);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('sumber_dana', 'like', '%' . $search . '%')
                  ->orWhere('keterangan', 'like', '%' . $search . '%');
            });
        }

        $inflows = $query->orderBy('tanggal_masuk', 'desc')->get();

        $years = Inflow::selectRaw('YEAR(tanggal_masuk) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        if (!in_array(now()->year, $years)) {
            $years[] = now()->year;
            rsort($years);
        }

        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        return view('admin.Inflow.cash_inflow', compact(
            'inflows',
            'years',
            'months',
            'bulan',
            'tahun',
            'search',
        ));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nominal' => 'required|numeric',
            'sumber_dana' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'tanggal_masuk' => 'required|date',
        ]);

        Inflow::create([
            'nominal' => $request->nominal,
            'sumber_dana' => $request->sumber_dana,
            'keterangan' => $request->keterangan,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return back()->with('success', 'Inflow data has been added successfully.');
    }

    public function update(Request $request, Inflow $inflow)
    {
        $validatedData = $request->validate([
            'nominal' => 'required|numeric',
            'sumber_dana' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'tanggal_masuk' => 'required|date',
        ]);

        $inflow->update($validatedData);

        return back()->with('success', 'Inflow data has been updated successfully.');
    }

    public function destroy($id)
    {
        $inflow = Inflow::findOrFail($id);
        $inflow->delete();

        return redirect()->route('inflow.index')->with('success', 'Inflow data has been deleted successfully.');
    }
}
