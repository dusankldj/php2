<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Specification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #region Unos proizvoda "The Osterman weekend" u tabelu products_specification (hardcode)
        $osterman = Product::where('name', 'The Osterman weekend')->first();

        $categoryId = $osterman->category_id;

        $category = DB::table('categories')->where('id', $categoryId)->first();

        // prvo pokušaj za tu kategoriju
        $specifications = DB::table('category_specification')
            ->where('category_id', $categoryId)
            ->pluck('specification_id');

        // ako nema → uzmi parent
        if ($specifications->isEmpty() && $category && $category->parent_id) {
            $specifications = DB::table('category_specification')
                ->where('category_id', $category->parent_id)
                ->pluck('specification_id');
        }

        $values = [
            'Robert Ludlum',
            'World Publishing Company',
            'Spy thriller',
            232
        ];

        foreach ($specifications as $index => $specId) {
            DB::table('products_specification')->insert([
                'product_id' => $osterman->id,
                'specification_id' => $specId,
                'value' => $values[$index] ?? null
            ]);
        }
        #endregion

        #region Unos proizvoda "The Rhinemann Exchange" u tabelu products_specification (hardcode)
        $rhinemann = Product::where('name', 'The Rhinemann Exchange')->first();

        $rhinemannCategoryId = $rhinemann->category_id;

        $rhinemannCategory = DB::table('categories')
            ->where('id', $rhinemannCategoryId)
            ->first();

        // prvo pokušaj za tu kategoriju
        $specificationsRhinemann = DB::table('category_specification')
            ->where('category_id', $rhinemannCategoryId)
            ->pluck('specification_id');

        // ako nema → uzmi parent
        if ($specificationsRhinemann->isEmpty() && $rhinemannCategory && $rhinemannCategory->parent_id) {
            $specificationsRhinemann = DB::table('category_specification')
                ->where('category_id', $rhinemannCategory->parent_id)
                ->pluck('specification_id');
        }

        $valuesRhinemann = [
            'Robert Ludlum',
            'Dial Press',
            'Spy thriller',
            357
        ];

        foreach ($specifications as $index => $specId){
            DB::table('products_specification')->insert([
                'product_id' => $rhinemann->id,
                'specification_id' => $specId,
                'value' => $valuesRhinemann[$index] ?? null
            ]);
        }
        #endregion

        #region Unos proizvoda "CORSAIR Vengeance CL40" u tabelu products_specification (hardcode)
        $ram=Product::where('name', 'CORSAIR Vengeance CL40')->first();

        $ramCategoryId=$ram->category_id;

        $ramCategory = DB::table('categories')
            ->where('id', $rhinemannCategoryId)
            ->first();

        // prvo pokušaj za tu kategoriju
        $specificationsRam = DB::table('category_specification')
            ->where('category_id', $ramCategoryId)
            ->pluck('specification_id');

        // ako nema → uzmi parent
        if ($specificationsRam->isEmpty() && $ramCategoryId && $ramCategoryId->parent_id) {
            $specificationsRam = DB::table('category_specification')
                ->where('category_id', $ramCategory->parent_id)
                ->pluck('specification_id');
        }

        $valuesRam = [
            8
        ];

        foreach ($specificationsRam as $index => $specId){
            DB::table('products_specification')->insert([
                'product_id' => $ram->id,
                'specification_id' => $specId,
                'value' => $valuesRam[$index] ?? null
            ]);
        }
        #endregion

        #region Unos proizvoda "Desperate Measures" u tabelu products_specification (hardcode)
        $measures=Product::where('name', 'Desperate Measures')->first();

        $measuresCategoryId = $measures->category_id;

        $measuresCategory = DB::table('categories')
            ->where('id', $measuresCategoryId)
            ->first();

        // prvo pokušaj za tu kategoriju
        $specificationsMeasures = DB::table('category_specification')
            ->where('category_id', $measuresCategoryId)
            ->pluck('specification_id');

        // ako nema → uzmi parent
        if ($specificationsMeasures->isEmpty() && $measuresCategory && $measuresCategory->parent_id) {
            $specificationsMeasures = DB::table('category_specification')
                ->where('category_id', $measuresCategory->parent_id)
                ->pluck('specification_id');
        }

        $valuesMeasures = [
            'David Morell',
            'Warner Books',
            'Spy thriller',
            320
        ];

        foreach ($specificationsMeasures as $index => $specId){
            DB::table('products_specification')->insert([
                'product_id' => $measures->id,
                'specification_id' => $specId,
                'value' => $valuesMeasures[$index] ?? null
            ]);
        }
        #endregion

        #region Unos proizvoda "GIGABYTE GeForce RTX 5050 GAMING OC" u tabelu products_specification (hardcode)
        $gpu=Product::where('name', 'GIGABYTE GeForce RTX 5050 GAMING OC')->first();

        $gpuCategoryId=$gpu->category_id;

        $gpuCategory=DB::table('categories')->where('id', $gpuCategoryId)->first();

        // prvo pokušaj za tu kategoriju
        $specificationsGPU = DB::table('category_specification')
            ->where('category_id', $gpuCategoryId)
            ->pluck('specification_id');

        // ako nema → uzmi parent
        if ($specificationsGPU->isEmpty() && $gpuCategory && $gpuCategory->parent_id) {
            $specificationsGPU = DB::table('category_specification')
                ->where('category_id', $measuresCategory->parent_id)
                ->pluck('specification_id');
        }

        $valuesGPU = [
            8,
            2632,
            130
        ];

        foreach ($specificationsGPU as $index => $specId){
            DB::table('products_specification')->insert([
                'product_id' => $gpu->id,
                'specification_id' => $specId,
                'value' => $valuesGPU[$index] ?? null
            ]);
        }
        #endregion

        #region Unos proizvoda "Forza Horizon 5" u tabelu products_specification (hardcode)
        $forza=Product::where('name', 'Forza Horizon 5')->first();

        $forzaCategoryId=$forza->category_id;

        $forzaCategory=DB::table('categories')->where('id', $forzaCategoryId)->first();

        // prvo pokušaj za tu kategoriju
        $specificationsForza = DB::table('category_specification')
            ->where('category_id', $forzaCategoryId)
            ->pluck('specification_id');

        // ako nema → uzmi parent
        if ($specificationsForza->isEmpty() && $forzaCategory && $forzaCategory->parent_id) {
            $specificationsForza = DB::table('category_specification')
                ->where('category_id', $forzaCategory->parent_id)
                ->pluck('specification_id');
        }

        $valuesForza = [
            40.7
        ];

        foreach ($specificationsForza as $index => $specId){
            DB::table('products_specification')->insert([
                'product_id' => $forza->id,
                'specification_id' => $specId,
                'value' => $valuesForza[$index] ?? null
            ]);
        }
        #endregion

        #region Unos proizvoda "Goat Simulator 3" u tabelu products_specification (hardcode)
        $goat=Product::where('name', 'Goat Simulator 3')->first();

        $goatCategoryId=$goat->category_id;

        $goatCategory=DB::table('categories')->where('id', $goatCategoryId)->first();

        // prvo pokušaj za tu kategoriju
        $specificationsGoat = DB::table('category_specification')
            ->where('category_id', $goatCategoryId)
            ->pluck('specification_id');

        // ako nema → uzmi parent
        if ($specificationsGoat->isEmpty() && $goatCategory && $goatCategory->parent_id) {
            $specificationsGoat = DB::table('category_specification')
                ->where('category_id', $goatCategory->parent_id)
                ->pluck('specification_id');
        }

        $valuesForza = [
            28.5
        ];

        foreach ($specificationsGoat as $index => $specId){
            DB::table('products_specification')->insert([
                'product_id' => $goat->id,
                'specification_id' => $specId,
                'value' => $valuesForza[$index] ?? null
            ]);
        }
        #endregion

        #region Unos proizvoda "Tesla: Inventor of the Modern" u tabelu products_specification (hardcode)
        $teslaBiography=Product::where('name', 'Tesla: Inventor of the Modern')->first();

        $teslaBiographyCategoryId=$teslaBiography->category_id;

        $teslaBiographyCategory=DB::table('categories')->where('id', $teslaBiographyCategoryId)->first();

        // prvo pokušaj za tu kategoriju
        $specificationsTeslaBiography = DB::table('category_specification')
            ->where('category_id', $goatCategoryId)
            ->pluck('specification_id');

        // ako nema → uzmi parent
        if ($specificationsTeslaBiography->isEmpty() && $teslaBiographyCategory && $teslaBiographyCategory->parent_id) {
            $specificationsTeslaBiography = DB::table('category_specification')
                ->where('category_id', $teslaBiographyCategory->parent_id)
                ->pluck('specification_id');
        }

        $valuesTeslaBiography=[
          'Richard Munson',
            'W.W. Norton & Company',
            'Science biography',
            320
        ];

        foreach ($specificationsTeslaBiography as $index => $specId){
            DB::table('products_specification')->insert([
                'product_id' => $teslaBiography->id,
                'specification_id' => $specId,
                'value' => $valuesTeslaBiography[$index] ?? null
            ]);
        }
        #endregion

        #region Unos proizvoda "Kingdom Come Deliverance 2 ROYAL EDITION" u tabelu products_specification (hardcode)
        $kcd2=Product::where('name', 'Kingdom Come Deliverance 2 ROYAL EDITION')->first();

        $kcd2CategoryId=$kcd2->category_id;

        $kcd2Category=DB::table('categories')->where('id', $kcd2CategoryId)->first();

        // prvo pokušaj za tu kategoriju
        $specificationsKcd2 = DB::table('category_specification')
            ->where('category_id', $kcd2CategoryId)
            ->pluck('specification_id');

        // ako nema → uzmi parent
        if ($specificationsKcd2->isEmpty() && $kcd2Category && $kcd2Category->parent_id) {
            $specificationsKcd2 = DB::table('category_specification')
                ->where('category_id', $kcd2Category->parent_id)
                ->pluck('specification_id');
        }

        $valuesKcd2=[
            '139.8'
        ];

        foreach ($specificationsKcd2 as $index => $specId){
            DB::table('products_specification')->insert([
                'product_id' => $kcd2->id,
                'specification_id' => $specId,
                'value' => $valuesKcd2[$index] ?? null
            ]);
        }
        #endregion
    }
}
