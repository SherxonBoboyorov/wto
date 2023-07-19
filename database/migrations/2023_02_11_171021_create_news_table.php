<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title_uz', 400)->nullable();
            $table->string('title_en', 400)->nullable();
            $table->string('title_ru', 400)->nullable();
            $table->text('sub_content_uz')->nullable();
            $table->text('sub_content_en')->nullable();
            $table->text('sub_content_ru')->nullable();
            $table->longText('content_uz')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_ru')->nullable();
            $table->timestamp('date_mask')->nullable();
            $table->string('image_url')->nullable();
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
        Schema::dropIfExists('news');
    }
}
