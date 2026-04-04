<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Books
        $booksId = DB::table('categories')->insertGetId([
            'name' => 'Books',
            'parent_id' => null
        ]);

        DB::table('categories')->insert([
            ['name' => 'Thrillers', 'parent_id' => $booksId],
            ['name' => 'History', 'parent_id' => $booksId],
            ['name' => 'Biography', 'parent_id' => $booksId]
        ]);


        //hardware
        $hardwareId = DB::table('categories')->insertGetId([
            'name' => 'Hardware Components',
            'parent_id' => null
        ]);

        DB::table('categories')->insert([
            ['name' => 'CPU', 'parent_id' => $hardwareId],
            ['name' => 'GPU', 'parent_id' => $hardwareId],
            ['name' => 'RAM', 'parent_id' => $hardwareId]
        ]);


        DB::table('categories')->insert([
            ['name' => 'Cars', 'parent_id' => null],
            ['name' => 'Clothes', 'parent_id' => null]
        ]);

        //video games
        $gamesId=DB::table('categories')->insertGetId([
            'name'=>'Video games',
            'parent_id'=>null
        ]);

        DB::table('categories')->insert([
            ['name'=>'RPG', 'parent_id'=>$gamesId],
            ['name'=>'Simulation', 'parent_id'=>$gamesId],
            ['name'=>'Sports', 'parent_id'=>$gamesId],
        ]);
    }
}
