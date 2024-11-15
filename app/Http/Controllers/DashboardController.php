<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Price;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedMonth = $request->input('month_year', now()->format('Y-m'));
        $months = Price::select('month_year')->distinct()->orderBy('month_year', 'desc')->pluck('month_year');
        $commoditiesSleep = 1;
        // $commoditiesSleep = Commodity::withCount(['prices' => function ($query) use ($selectedMonth) {
        //     $query->where('month_year', $selectedMonth)->where('status', 'Harga Tidur');
        // }])->get();
        $commoditiesExtreme = 1;
        // $commoditiesExtreme = Commodity::withCount(['prices' => function ($query) use ($selectedMonth) {
        //     $query->where('month_year', $selectedMonth)->where('status', 'Harga Ekstrim');
        // }])->get();

        $totalCommodities = Commodity::count();
        // Calculate percentage of commodities with prices
        $priceCount = Price::where('month_year', $selectedMonth)->count();
        $percentageWithPrice = ($totalCommodities > 0) ? ($priceCount / $totalCommodities) * 100 : 0;

        // Pass data to the view
        return view('dashboard', compact('commoditiesSleep', 'commoditiesExtreme', 'percentageWithPrice', 'selectedMonth', 'months'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
