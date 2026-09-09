<?php

namespace App\Http\Controllers;

use App\Models\PlanSpanding;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = PlanSpanding::orderBy('created_at', 'desc')->get();

        return view('admin.Plan.plan_spending', compact('plans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'status' => 'nullable|in:plan,purchase,already',
        ]);

        PlanSpanding::create([
            'item' => $request->item,
            'price' => $request->price,
            'category' => $request->category,
            'status' => $request->status ?? 'plan',
        ]);

        return back()->with('success', 'Plan data has been added successfully.');
    }

    public function update(Request $request, $id) {


    }

    public function destroy($id) {

        $plans = PlanSpanding::findOrFail($id);
        $plans->delete();

        return back()->with('success', 'Plan data has been deleted successfully.');        
    }
}
