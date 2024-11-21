<?php

namespace App\Http\Controllers;

use App\Imports\PriceImport;
use App\Models\Price;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function import(Request $request)
    {
        // Validasi file dan month_year
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls|max:2048', // Sesuaikan type dan size
            'month_year' => 'required|string', // Validasi month_year
        ]);

        // Mengimpor file Excel
        Excel::import(new PriceImport($request->month_year), $request->file('file'));

        return back()->with('success', 'Data berhasil diimpor.');
    }

    public function index(Request $request)
    {
        $selectedMonthYear = $request->input('month_year', now()->format('Y-m'));
        $searchCommodity = $request->input('search');

        // Ambil semua month_year unik untuk dropdown
        $monthYears = Price::select('month_year')->distinct()->orderBy('month_year', 'desc')->pluck('month_year');
        // Ambil data harga berdasarkan month_year dan nama komoditas
        $pricesQuery = Price::with('commodity')->where('month_year', $selectedMonthYear);

        if ($searchCommodity) {
            $pricesQuery->where(function($query) use ($searchCommodity) {
                $query->whereHas('commodity', function($q) use ($searchCommodity) {
                    $q->where('name', 'like', '%' . $searchCommodity . '%');
                })->orWhere('status', 'like', '%' . $searchCommodity . '%');
            });
        }

        $prices = $pricesQuery->get();

        return view('price.index', compact('prices', 'monthYears', 'selectedMonthYear', 'searchCommodity'));
    }

        public function create()
    {
        //
    }

        public function store(Request $request)
    {
        //
    }

        public function show(string $id)
    {
        //
    }

        public function edit(string $id)
    {
        //
    }

       public function update(Request $request, string $id)
    {
        //
    }

        public function destroy(string $id)
    {
        //
    }
}
