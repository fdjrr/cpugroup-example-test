<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Oli Mesin Mobil 5W-30',
                'supplier_id' => 1,
                'category_id' => 1,
                'sku'         => 'OLI-5W30',
                'quantity'    => 50,
                'price'       => 75000,
                'description' => 'Oli mesin berkualitas untuk mobil, cocok untuk semua jenis kendaraan.',
            ],
            [
                'name'        => 'Kampas Rem Depan',
                'supplier_id' => 2,
                'category_id' => 1,
                'sku'         => 'BRK-FRONT',
                'quantity'    => 30,
                'price'       => 120000,
                'description' => 'Kampas rem berkualitas tinggi untuk rem depan, kompatibel dengan banyak jenis mobil.',
            ],
            [
                'name'        => 'Filter Udara Mobil',
                'supplier_id' => 3,
                'category_id' => 2,
                'sku'         => 'FLT-AIR',
                'quantity'    => 100,
                'price'       => 45000,
                'description' => 'Filter udara untuk menjaga kebersihan udara mesin, meningkatkan performa.',
            ],
            [
                'name'        => 'Aki Mobil MF 55B24L',
                'supplier_id' => 4,
                'category_id' => 3,
                'sku'         => 'BAT-MF55',
                'quantity'    => 20,
                'price'       => 850000,
                'description' => 'Aki mobil bebas perawatan, cocok untuk berbagai model mobil.',
            ],
            [
                'name'        => 'Busi Iridium',
                'supplier_id' => 5,
                'category_id' => 1,
                'sku'         => 'SPK-IRID',
                'quantity'    => 60,
                'price'       => 65000,
                'description' => 'Busi iridium untuk performa mesin yang lebih optimal dan efisiensi bahan bakar.',
            ],
            [
                'name'        => 'Radiator Coolant',
                'supplier_id' => 1,
                'category_id' => 2,
                'sku'         => 'RDT-COOL',
                'quantity'    => 40,
                'price'       => 50000,
                'description' => 'Coolant radiator berkualitas untuk menjaga suhu mesin tetap stabil.',
            ],
            [
                'name'        => 'Bantalan Roda Belakang',
                'supplier_id' => 2,
                'category_id' => 3,
                'sku'         => 'WHL-BEAR',
                'quantity'    => 25,
                'price'       => 95000,
                'description' => 'Bantalan roda belakang untuk stabilitas mobil dan kenyamanan berkendara.',
            ],
            [
                'name'        => 'Kabel Aki Mobil',
                'supplier_id' => 3,
                'category_id' => 1,
                'sku'         => 'CAB-BAT',
                'quantity'    => 70,
                'price'       => 30000,
                'description' => 'Kabel aki berkualitas tinggi untuk arus listrik yang optimal.',
            ],
            [
                'name'        => 'Filter Bensin',
                'supplier_id' => 4,
                'category_id' => 2,
                'sku'         => 'FLT-FUEL',
                'quantity'    => 90,
                'price'       => 55000,
                'description' => 'Filter bensin yang efektif menyaring kotoran agar mesin lebih awet.',
            ],
            [
                'name'        => 'Lampu Depan LED',
                'supplier_id' => 5,
                'category_id' => 3,
                'sku'         => 'LED-FRONT',
                'quantity'    => 45,
                'price'       => 150000,
                'description' => 'Lampu depan LED dengan cahaya terang, hemat energi, dan tahan lama.',
            ],
        ];

        Product::insert($products);
    }
}
