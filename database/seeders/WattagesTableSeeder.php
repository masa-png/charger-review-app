<?php

namespace Database\Seeders;

use App\Models\Wattage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WattagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wattages = [
            '15〜20', '27〜45', '65',
            '96', '100',
        ];

        foreach ($wattages as $wattage) {
            Wattage::create([
                'watt' => $wattage,
            ]);
        }
    }
}
