<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForChildrenCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('for_children_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title_uz', 400)->nullable();
            $table->string('title_en', 400)->nullable();
            $table->string('title_ru', 400)->nullable();
            $table->boolean('status')->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('for_children_categories');
    }
}
