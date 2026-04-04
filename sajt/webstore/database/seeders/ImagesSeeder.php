<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Database\Seeders\ProductsSeeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #region The Osterman Weekend
        $osterman = Product::where('name', 'The Osterman weekend')->first();

        $osterman->images()->create([
            'image_path' => 'products_images/osterman_weekend.jpg',
            'image_alt' => 'osterman_weekend',
            'is_thumbnail' => true,
            'product_id'=> $osterman->id
        ]);
        #endregion

        #region The Rhinemann Exchange
        $rhinemann=Product::where('name', 'The Rhinemann Exchange')->first();

        $rhinemann->images()->createMany([
            ['image_path' => 'products_images/rhinemann_exchange1.jpg',
                'image_alt'=>'rhinemann_thumbnail',
                'is_thumbnail' => true,
                'product_id'=> $rhinemann->id],
            ['image_path' => 'products_images/rhinemann_exchange2.jpg',
                'image_alt'=>'rhinemann_exchange',
                'is_thumbnail' => false,
                'product_id'=> $rhinemann->id]
        ]);
        #endregion

        #region CORSAIR Vengeance CL40
        $cl40=Product::where('name', 'CORSAIR Vengeance CL40')->first();

        $cl40->images()->create([
            'image_path' => 'products_images/corsair_cl40.jpg',
            'image_alt' => 'corsair_cl40',
            'is_thumbnail' => true,
            'product_id'=> $cl40->id
        ]);
        #endregion

        #region Desperate Measures
        $measures=Product::where('name', 'Desperate Measures')->first();

        $measures->images()->createMany([
            ['image_path' => 'products_images/desperate_measures1.jpg',
                'image_alt'=>'measures_thumbnail',
                'is_thumbnail' => true,
                'product_id'=> $measures->id],
            ['image_path' => 'products_images/desperate_measures2.jpg',
                'image_alt'=>'desperate_measures_front',
                'is_thumbnail' => false,
                'product_id'=> $measures->id],
            ['image_path' => 'products_images/desperate_measures3.jpg',
                'image_alt'=>'desperate_measures',
                'is_thumbnail' => false,
                'product_id'=> $measures->id]
        ]);
        #endregion

        #region GIGABYTE GeForce RTX 5050 GAMING OC
        $rtx5050=Product::where('name', 'GIGABYTE GeForce RTX 5050 GAMING OC')->first();

        $rtx5050->images()->create([
            'image_path' => 'products_images/rtx5050.jpeg',
            'image_alt' => 'rtx_5050',
            'is_thumbnail' => true,
            'product_id'=> $rtx5050->id
        ]);
        #endregion

        #region Forza Horizon 5
        $forza=Product::where('name', 'Forza Horizon 5')->first();

        $forza->images()->createMany([
            ['image_path'=>'products_images/forza_1.jpg', 'image_alt'=>'forza_thumbnail', 'is_thumbnail' => true, 'product_id'=> $forza->id],
            ['image_path'=>'products_images/forza_2.jpg', 'image_alt'=>'forza_horizon', 'is_thumbnail' => false, 'product_id'=> $forza->id],
            ['image_path'=>'products_images/forza_3.jpg', 'image_alt'=>'forza_sunset', 'is_thumbnail' => false, 'product_id'=> $forza->id]
        ]);
        #endregion

        #region Goat Simulator 3
        $goatSimulator=Product::where('name', 'Goat Simulator 3')->first();

        $goatSimulator->images()->createMany([
            ['image_path'=>'products_images/goat_simulator.png', 'image_alt'=>'goat_thumbnail', 'is_thumbnail' => true, 'product_id'=> $goatSimulator->id],
            ['image_path'=>'products_images/goat.jpg', 'image_alt'=>'goat_main_character', 'is_thumbnail' => false, 'product_id'=> $goatSimulator->id]
        ]);
        #endregion

        #region Tesla: Inventor of the Modern
        $teslaBiography=Product::where('name', 'Tesla: Inventor of the Modern')->first();

        $teslaBiography->images()->createMany([
            ['image_path'=>'products_images/tesla_biography.png', 'image_alt'=>'tesla_book', 'is_thumbnail' => true, 'product_id'=> $teslaBiography->id]
        ]);
        #endregion

        #region Kingdom Come Deliverance 2
        $kcd2=Product::where('name', 'Kingdom Come Deliverance 2 ROYAL EDITION')->first();

        $kcd2->images()->createMany([
            ['image_path'=>'products_images/kcd2_thumbnail.png', 'image_alt'=>'kcd2_thumbnail', 'is_thumbnail' => true, 'product_id'=> $kcd2->id],
            ['image_path'=>'products_images/kcd2_henry.jpg', 'image_alt'=>'kcd2_picture', 'is_thumbnail' => false, 'product_id'=> $kcd2->id],
            ['image_path'=>'products_images/kcd2_scene.png', 'image_alt'=>'kcd2_henry_and_hans', 'is_thumbnail' => false, 'product_id'=> $kcd2->id],
        ]);
        #endregion
    }
}
