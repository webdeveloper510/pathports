<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) { 
            $table->id();
             $table->string('meeting_title')->nullable();
            $table->string('meeting_description')->nullable(); 
            $table->string('from_user_id')->nullable();
            $table->string('to_user_id')->nullable();
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('agenda_id');
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
            $table->foreign('agenda_id')->references('id')->on('agenda')->onDelete('cascade');
            $table->string('timezone')->nullable();
            $table->string('start_date_time');
            $table->string('end_date_time');
            $table->string('meeting_url')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('meetings');
    }
}
