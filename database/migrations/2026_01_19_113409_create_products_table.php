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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->integer('quantity')->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->longText('product_details')->nullable();
            $table->text('delivery_policy')->nullable();
            $table->text('return_policy')->nullable();
            $table->boolean('status')->default(1);
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('sub_category_id')->constrained('sub_categories')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
