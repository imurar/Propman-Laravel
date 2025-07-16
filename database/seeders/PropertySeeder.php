<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::create([
            'name' => 'Sample Tokyotower',
            'address' => '東京都港区芝公園test',
            'latitude' => '35.3931',
            'longitude' => '139.4444',
        ]);
    }
}
