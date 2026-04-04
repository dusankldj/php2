<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $osterman = Product::create([
            'name'=>'The Osterman weekend',
            'price'=>6,
            'description'=>"Second book...",
            'stock'=>3,
            'category_id'=>2
        ]);

        $rhinemann = Product::create([
            'name'=>'The Rhinemann Exchange',
            'price'=>8.5,
            'description'=>"WW2 exchange...",
            'stock'=>1,
            'category_id'=>2
        ]);

        $ram = Product::create([
            'name'=>'CORSAIR Vengeance CL40',
            'price'=>219.9,
            'description'=>"Ram memory",
            'stock'=>5,
            'category_id'=>8
        ]);

        $desperate = Product::create([
            'name'=>'Desperate Measures',
            'price'=>7.5,
            'description'=>"Journalist story...",
            'stock'=>2,
            'category_id'=>2
        ]);

        $gpu = Product::create([
            'name'=>'GIGABYTE GeForce RTX 5050 GAMING OC',
            'price'=>450,
            'discount_price'=>400,
            'description'=>"High quality gpu card...",
            'stock'=>2,
            'category_id'=>7
        ]);

        $forza=Product::create([
            'name'=>'Forza Horizon 5',
            'price'=>120,
            'discount_price'=>100,
            'description'=>"High rated racing videogame...",
            'stock'=>3,
            'category_id'=>14
        ]);

        $goatSimulator=Product::create([
            'name'=>'Goat Simulator 3',
            'price'=>55,
            'description'=>"Image you are a goat...",
            'stock'=>1,
            'category_id'=>13
        ]);

        $teslaBiography=Product::create([
            'name'=>'Tesla: Inventor of the Modern',
            'price'=>12.9,
            'description'=>"Bioghraphy about greatest Serbian inventor...",
            'stock'=>0,
            'category_id'=>4
        ]);

        $kcd2=Product::create([
            'name'=>'Kingdom Come Deliverance 2 ROYAL EDITION',
            'price'=>200,
            'discount_price'=>169.9,
            'description'=>"Unfinished bussiness expects Henry and sir Hans in new teritory...",
            'stock'=>0,
            'category_id'=>12
        ]);
    }
}
