<?php

namespace App\Http\Controllers;

use App\Imports\PriceImport;
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

    public function index()
    {
        //
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
