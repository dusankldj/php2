<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'Luka',
            'surname'=>'Lukić',
            'username'=>'l.lukic',
            'email'=>'luka.lukic@ict.edu.rs',
            'password'=>bcrypt('luka123'),
            'role_id'=>1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name'=>'Danijel',
            'surname'=>'Grebovič',
            'username'=>'grebo',
            'email'=>'danijel.grebovic.153.22@ict.edu.rs',
            'password'=>bcrypt('grebo123'),
            'role_id'=>2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
