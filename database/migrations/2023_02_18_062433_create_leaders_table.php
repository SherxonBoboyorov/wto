<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaders', function (Blueprint $table) {
            $table->id();
            $table->string('image_url');
            $table->string('name_uz', 400);
            $table->string('name_en', 400);
            $table->string('name_ru', 400);
            $table->string('position_uz', 255);
            $table->string('position_en', 255);
            $table->string('position_ru', 255);
            $table->string('phone', 255);
            $table->string('reception_days_uz', 255);
            $table->string('reception_days_en', 255);
            $table->string('reception_days_ru', 255);
            $table->string('email', 255);
            $table->longText('content_uz');
            $table->longText('content_en');
            $table->longText('content_ru');
            $table->integer('order');
            $table->boolean('status');
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
        Schema::dropIfExists('leaders');
    }
}
