<?php

namespace Database\Seeders;

use App\Models\Specification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specification::insert([
            ['name'=>'Author'],
            ['name'=>'Publisher'],
            ['name'=>'Genre'],
            ['name'=>'Page number'],
            ['name'=>'Capacity'],
            ['name'=>'Video memory(VRAM)'],
            ['name'=>'Clock speed'],
            ['name'=>'Voltage'],
            ['name'=>'Storage'],
        ]);
    }
}
