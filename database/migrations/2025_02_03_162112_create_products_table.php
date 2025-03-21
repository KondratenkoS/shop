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

            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->string('preview_image');

            $table->integer('price');
            $table->integer('count');
            $table->boolean('is_published')->default(true);

            $table->foreignId('category_id')->nullable()->index()->constrained('categories')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_color');
        Schema::dropIfExists('product_tag');
        Schema::dropIfExists('products');
    }
};
