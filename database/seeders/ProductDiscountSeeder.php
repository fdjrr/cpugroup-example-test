<?php

namespace Database\Seeders;

use App\Models\ProductDiscount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_discounts = [
            [
                'product_id' => 1,
                'discount' => 5,
                'expired_at' => '2024-10-28',
            ],
            [
                'product_id' => 1,
                'discount' => 10,
                'expired_at' => '2024-10-27',
            ]
        ];

        ProductDiscount::insert($product_discounts);
    }
}
