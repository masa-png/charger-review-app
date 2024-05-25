<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type_names = [
            '壁挿し', '卓上', 'ワイヤレス',
            'マグネット', 'ステーション',
        ];

        foreach ($type_names as $type_name) {
            Type::create([
                'name' => $type_name,
            ]);
        }
    }
}
