<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bahan')->insert([
            'nama_produk' => "BROKOLI",
            'harga' => 5000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('bahan')->insert([
            'nama_produk' => "KOL",
            'harga' => 6000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('bahan')->insert([
            'nama_produk' => "SAWI",
            'harga' => 7000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('bahan')->insert([
            'nama_produk' => "BOK CHOY",
            'harga' => 8000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
