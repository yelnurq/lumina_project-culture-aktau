<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $districts = [
            ['name' => 'Аягөз', 'latitude' => 49.7897, 'longitude' => 80.4528],
            ['name' => 'Ақсуат', 'latitude' => 49.9200, 'longitude' => 81.9270],
            ['name' => 'Қалбатау', 'latitude' => 49.6465, 'longitude' => 82.3660],
            ['name' => 'Тарбағатай', 'latitude' => 50.1640, 'longitude' => 82.9210],
            ['name' => 'Улан', 'latitude' => 49.5360, 'longitude' => 81.9550],
            ['name' => 'Зайсан', 'latitude' => 48.6663, 'longitude' => 84.8641],
        ];


        DB::table('regions')->insert($districts);
    }
}
