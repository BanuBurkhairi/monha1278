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
        $commodityId = $row['Kode Komoditas'];

        $commodityPrice = Price::where('month_year', $this->month_year)->where('commodity_id', $commodityId)->first();
        
        if ($commodityPrice) {
            // Jika sudah ada, update harga dan RH
            $commodityPrice->price = $row['Price'];
            $commodityPrice->rh = $row['RH'];
            $commodityPrice->save(); // Simpan perubahan
        } else {
            // Jika belum ada, create entry baru
            return new Price([
                'commodity_id' => $commodityId, // mengisi dari kolom "Kode Komoditas"
                'month_year'   => $this->month_year,       // Menambahkan month_year dari input form
                'price'        => $row['Price'],            // mengisi dari kolom "Price"
                'rh'           => $row['RH'],               // mengisi dari kolom "RH"
                // Pastikan field lain diisi jika diperlukan
            ]);
        }

        
    }
}
