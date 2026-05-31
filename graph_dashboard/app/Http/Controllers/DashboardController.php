<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
public function index()
{
    $salesData = Sale::selectRaw('SUM(amount) as total, MONTHNAME(sale_date) as month, MONTH(sale_date) as month_num')
        ->groupBy('month', 'month_num')
        ->orderBy('month_num')
        ->get();

    // Ensure these variables match the names in your Blade file
    return view('dashboard', [
        'labels' => $salesData->pluck('month'),
        'data' => $salesData->pluck('total'),
    ]);
}

}