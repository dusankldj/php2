<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products_specification', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained('products')
                ->onDelete('cascade');

            $table->foreignId('specification_id')
                ->constrained('specifications')
                ->onDelete('cascade')
                ->nullable();

            //kompozitni index
            $table->index(['product_id', 'specification_id']);

            //ako se bude filtriralo po value ubaciti i njega u kompozitni index
            $table->string('value')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_specification');
    }
};
