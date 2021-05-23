<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovidCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid_case', function (Blueprint $table) {
            $table->id();
            $table->string('patient_case');
            $table->string('recover_case');
            $table->string('dead_case');
            $table->integer('category_caseid');
            $table->integer('area_id');
            $table->date('date_add');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('covid_case');
    }
}