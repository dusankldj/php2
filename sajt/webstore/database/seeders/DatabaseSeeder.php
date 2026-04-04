<?php

namespace Database\Seeders;

use App\Models\Specification;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategoriesSeeder::class,
            ProductsSeeder::class,
            ImagesSeeder::class,
            SpecificationSeeder::class,
            CategorySpecificationSeeder::class,
            ProductSpecificationSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class
        ]);


    }
}
