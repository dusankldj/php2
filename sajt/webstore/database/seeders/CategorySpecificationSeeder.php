<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Specification;

class CategorySpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books=Category::where('name', 'Books')->firstorFail();

        $bookSpecIds=Specification::whereIn('name', [
            'Author', 'Publisher', 'Genre', 'Page number'
        ])->pluck('id');

        $books->specifications()->attach($bookSpecIds);


        $ram=Category::where('name', 'RAM')->firstorFail();

        $ramSpecIds=Specification::whereIn('name', [
            'Capacity'
        ])->pluck('id');

        $ram->specifications()->attach($ramSpecIds);


        $gpu=Category::where('name', 'GPU')->firstorFail();

        $gpuSpecIds=Specification::whereIn('name', [
            'Video memory(VRAM)', 'Clock speed', 'Voltage'
        ])->pluck('id');

        $gpu->specifications()->attach($gpuSpecIds);


        $games=Category::where('name', 'Video games')->firstorFail();

        $gamesSpecIds=Specification::whereIn('name', [
            'Storage'
        ])->pluck('id');

        $games->specifications()->attach($gamesSpecIds);
    }
}
