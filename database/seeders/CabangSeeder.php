<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['jakarta-pusat' => 'Jakarta Pusat', 'jakarta-selatan' => 'Jakarta Selatan'] as $slug => $name) {
            Cabang::firstOrCreate(['slug' => $slug], ['name' => $name]);
        }
    }
}
