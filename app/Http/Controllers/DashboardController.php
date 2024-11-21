<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Price;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil data month_year yang terpilih dari request
        $selectedMonthYear = $request->input('month_year', now()->format('Y-m'));
        $months = Price::select('month_year')->distinct()->orderBy('month_year', 'desc')->pluck('month_year');
        $selectedCommodity = $request->input('commodity_id');
        $selectedCommodity = $selectedCommodity ?? 111001;
        $commodities = Commodity::get();

        // Hitung persentase progres pemasukan data pada month_year terpilih
        $totalPrices = Price::where('month_year', $selectedMonthYear)
            ->count();

        $filledPrices = Price::where('month_year', $selectedMonthYear)
            ->where('price', '>', 0)
            ->count();

        $progressPercentage = $totalPrices > 0 ? number_format(($filledPrices / $totalPrices) * 100, 2) : 0;

        // Hitung jumlah komoditas dengan status "Ekstrim"
        $ekstrimCount = Price::where('month_year', $selectedMonthYear)
            ->where('status', 'Ekstrim')
            ->distinct('commodity_id')
            ->count('commodity_id');

        // Hitung jumlah komoditas tidur
        $periode = Carbon::createFromFormat('Y-m', $selectedMonthYear);
        $permin1 = $periode->subMonth()->format('Y-m');
        $permin2 = $periode->subMonth()->format('Y-m');

        $hargatidur = Price::whereIn('month_year', [
            $selectedMonthYear,
            $permin1,
            $permin2
        ])->groupBy('commodity_id')->havingRaw('COUNT(CASE WHEN status = "Tetap" THEN 1 END) = 3')->get('commodity_id');
        
        $sleepingCount = $hargatidur->count();
        
        // Ambil data harga untuk grafik
        $priceData = Price::where('commodity_id', '=', $selectedCommodity)
            ->orderBy('month_year', 'asc')
            ->get(['month_year', 'price']);

        $chartData = [];
        $chartLabels = [];

        foreach ($priceData as $price) {
            $chartLabels[] = $price->month_year;
            $chartData[] = $price->price;
        }

        return view('dashboard', compact('progressPercentage', 'ekstrimCount', 'sleepingCount', 'chartData', 'chartLabels', 'selectedMonthYear', 'months', 'commodities'));
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
