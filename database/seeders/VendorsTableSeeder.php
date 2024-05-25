<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendor_names = [
            'ANKER', 'CIO', 'ELECOM',
            'Belkin', 'Apple',
        ];

        foreach ($vendor_names as $vendor_name) {
            Vendor::create([
                'name' => $vendor_name,
            ]);
        }
    }
}
