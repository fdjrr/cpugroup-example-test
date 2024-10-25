<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name'         => 'PT. Auto Sparepart Prima',
                'contact_info' => '021-555-1234',
                'address'      => 'Jl. Industri No.1, Jakarta',
            ],
            [
                'name'         => 'CV. Mobilindo Jaya',
                'contact_info' => '022-333-5678',
                'address'      => 'Jl. Sudirman No.10, Bandung',
            ],
            [
                'name'         => 'PT. Mekanik Auto Parts',
                'contact_info' => '021-444-7890',
                'address'      => 'Jl. Kebon Jeruk No.20, Jakarta',
            ],
            [
                'name'         => 'UD. Sumber Sparepart',
                'contact_info' => '024-666-4444',
                'address'      => 'Jl. Diponegoro No.15, Semarang',
            ],
            [
                'name'         => 'PT. Sparepart Nusantara',
                'contact_info' => '031-555-9999',
                'address'      => 'Jl. Raya Gubeng No.5, Surabaya',
            ],
            [
                'name'         => 'CV. Jaya Abadi',
                'contact_info' => '0271-888-5555',
                'address'      => 'Jl. Slamet Riyadi No.99, Solo',
            ],
            [
                'name'         => 'PT. Sejahtera Motorindo',
                'contact_info' => '0251-444-2222',
                'address'      => 'Jl. Pajajaran No.25, Bogor',
            ],
            [
                'name'         => 'UD. Citra Auto Parts',
                'contact_info' => '0261-777-3333',
                'address'      => 'Jl. Ahmad Yani No.50, Cirebon',
            ],
            [
                'name'         => 'CV. Makmur Jaya',
                'contact_info' => '021-333-8888',
                'address'      => 'Jl. Gatot Subroto No.2, Jakarta',
            ],
            [
                'name'         => 'PT. Berkah Sukses Parts',
                'contact_info' => '031-444-5555',
                'address'      => 'Jl. Basuki Rahmat No.12, Malang',
            ],
        ];

        Supplier::insert($suppliers);
    }
}
