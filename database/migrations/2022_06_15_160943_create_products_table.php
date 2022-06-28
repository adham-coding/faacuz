<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('category_id');
            $table->text('images');
            $table->string('slug');
            $table->unsignedBigInteger('price');
            $table->integer('hit')->default(0);
            $table->text('features_uz');
            $table->text('features_ru');
            $table->text('features_en');
            $table->text('description_uz');
            $table->text('description_ru');
            $table->text('description_en');
            // $table->string('requirements');
            // $table->string('instructions');
            // $table->string('parts');
            $table->string('youtube');
            $table->boolean('state')->default(true);
            $table->unsignedBigInteger('order')->default(1);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
