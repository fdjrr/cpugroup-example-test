<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = [
            [
                'user_id'          => 1,
                'product_id'       => 1,
                'transaction_type' => 'In',
                'quantity'         => 10,
                'transaction_date' => Carbon::now()->subDays(10)->format('Y-m-d'),
            ],
            [
                'user_id'          => 1,
                'product_id'       => 2,
                'transaction_type' => 'Out',
                'quantity'         => 5,
                'transaction_date' => Carbon::now()->subDays(8)->format('Y-m-d'),
            ],
            [
                'user_id'          => 1,
                'product_id'       => 3,
                'transaction_type' => 'In',
                'quantity'         => 15,
                'transaction_date' => Carbon::now()->subDays(7)->format('Y-m-d'),
            ],
            [
                'user_id'          => 1,
                'product_id'       => 4,
                'transaction_type' => 'Out',
                'quantity'         => 2,
                'transaction_date' => Carbon::now()->subDays(5)->format('Y-m-d'),
            ],
            [
                'user_id'          => 1,
                'product_id'       => 5,
                'transaction_type' => 'In',
                'quantity'         => 20,
                'transaction_date' => Carbon::now()->subDays(4)->format('Y-m-d'),
            ],
            [
                'user_id'          => 1,
                'product_id'       => 6,
                'transaction_type' => 'Out',
                'quantity'         => 3,
                'transaction_date' => Carbon::now()->subDays(3)->format('Y-m-d'),
            ],
            [
                'user_id'          => 1,
                'product_id'       => 7,
                'transaction_type' => 'In',
                'quantity'         => 8,
                'transaction_date' => Carbon::now()->subDays(2)->format('Y-m-d'),
            ],
            [
                'user_id'          => 1,
                'product_id'       => 2,
                'transaction_type' => 'Out',
                'quantity'         => 1,
                'transaction_date' => Carbon::now()->subDays(1)->format('Y-m-d'),
            ],
            [
                'user_id'          => 1,
                'product_id'       => 6,
                'transaction_type' => 'In',
                'quantity'         => 12,
                'transaction_date' => Carbon::now()->format('Y-m-d'),
            ],
            [
                'user_id'          => 1,
                'product_id'       => 4,
                'transaction_type' => 'Out',
                'quantity'         => 6,
                'transaction_date' => Carbon::now()->format('Y-m-d'),
            ],
        ];

        Transaction::insert($transactions);
    }
}
