<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationObtainedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualification_obtained', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('overallScore');
            $table->integer('applicant_id');
            $table->integer('result_id');
            $table->integer('qualification_id');
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
        Schema::dropIfExists('qualification_obtained');
    }
}
