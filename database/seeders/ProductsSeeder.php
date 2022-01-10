<?php

namespace Database\Seeders;

use Dotenv\Util\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                'kode_produk' => 'PRD - 2909',
                'nama_produk' => 'Aqua Gelas 230ml - 1 Kardus',
                'harga' => 23000
            ],
            [
                'kode_produk' => 'PRD - 3913',
                'nama_produk' => 'Luwak White Kopi - 1 Renceng',
                'harga'       => 12000
            ],
            [
                'kode_produk' => 'PRD - 3511',
                'nama_produk' => 'Bengbeng - 1 Dus',
                'harga'       => 15000
            ],
            [
                'kode_produk' => 'PRD - 7021',
                'nama_produk' => "Le'Minerale 15 Liter - 1 Galon",
                'harga'       => 17500
            ],
        );
    }
}
