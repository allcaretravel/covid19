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
            $table->integer('province_id');
            $table->string('community_case')->nullable();
            $table->string('foreigner_case')->nullable();
            $table->string('total');
            $table->string('recovered');
            $table->string('deaths');
            $table->date('date');
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
        Schema::dropIfExists('covid_case');
    }
}
