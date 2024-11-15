<?php

namespace App\Imports;

use App\Models\Price;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class PriceImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    private $month_year;

    public function __construct($month_year)
    {
        $this->month_year = $month_year;
    }

    public function model(array $row)
    {
        $commodityId = $row['kode_komoditas'];

        $commodityPrice = Price::where('month_year', $this->month_year)->where('commodity_id', $commodityId)->first();
        
        if ($commodityPrice) {
            // Jika sudah ada, update harga dan RH
            $commodityPrice->price = $row['price'];
            $commodityPrice->rentang = $row['rh'];
            $commodityPrice->save(); // Simpan perubahan
        } else {
            // Jika belum ada, create entry baru
            \Log::info($row);
            return new Price([
                'commodity_id' => $commodityId,
                'month_year' => $this->month_year,
                'price' => $row['price'],
                'rentang' => $row['rh'],
                // Pastikan field lain diisi jika diperlukan
            ]);
        }

        
    }
}
