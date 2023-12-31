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
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->id();
            $table->string('name_pelatihan');
            //  $table->text('description_pelatihan');
              $table->string('slug_pelatihan');
              $table->date('start_date');
              $table->date('end_date');
              $table->unsignedBigInteger('category_id');
              $table->foreign('category_id')->references('id')->on('category_pelatihans');
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
        Schema::dropIfExists('pelatihans');
    }
};