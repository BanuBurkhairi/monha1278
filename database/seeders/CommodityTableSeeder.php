<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class CommodityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = public_path('komoditi.csv');
        $reader = Reader::createFromPath($csvFile, 'r');
        $reader->setHeaderOffset(0);

        foreach ($reader as $record) {
            DB::table('commodities')->insert([
                'id' => $record['kode_komoditas'],
                'name' => $record['nama_komoditas'],
                'kode_kuesioner' => $record['kuesioner'],
                'note' => $record['note'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
