<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.Plan.plan_spending');
    }
}
