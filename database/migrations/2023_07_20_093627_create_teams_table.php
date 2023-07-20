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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('title_uz', 400)->nullable();
            $table->string('title_en', 400)->nullable();
            $table->string('title_ru', 400)->nullable();
            $table->longText('content_uz')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_ru')->nullable();
            $table->longText('biography_uz')->nullable();
            $table->longText('biography_en')->nullable();
            $table->longText('biography_ru')->nullable();
            $table->longText('publication_uz')->nullable();
            $table->longText('publication_en')->nullable();
            $table->longText('publication_ru')->nullable();
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
        Schema::dropIfExists('teams');
    }
};
