<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcat_id');
            
            $table->foreign('subcat_id')->references('id')->on('interest_areas_sub_categories')->onDelete('cascade');
            $table->string('interest_area_name');
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
        Schema::dropIfExists('interest_areas');
    }
}
