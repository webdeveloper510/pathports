<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('alternative_email')->after('email')->nullable(); 
            $table->string('contact')->after('alternative_email')->nullable();
            $table->string('gender')->after('university_id')->nullable();
            $table->string('year_of_joining')->after('gender')->nullable();
            $table->string('blood_group')->after('year_of_joining')->nullable();
            $table->string('race')->after('blood_group')->nullable();
            $table->string('lgbq')->after('race')->nullable();
            $table->string('veteran')->after('lgbq')->nullable();
            $table->string('green_card')->after('veteran')->nullable();
            $table->string('education_level')->after('green_card')->nullable();
            $table->string('born_raised_global')->after('education_level')->nullable();
            $table->string('born_raised_us')->after('born_raised_global')->nullable();
            $table->string('location_global')->after('born_raised_us')->nullable();
            $table->string('graduate_resume')->after('image')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['alternative_email','contact','gender','year_of_joining','race','lgbq','veteran','green_card','education_level','born_raised_global'
        ,'born_raised_us','location_global','graduate_resume']);
        });
    }
}
