<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healths', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('facility');
            $table->string('disease');
            $table->text('symptomps_signs');
            $table->text('medication');
            $table->text('efects');
            $table->mediumtext('allergy');
            $table->string('blood_sugar');
            $table->string('blood_pressure');
            $table->string('height')->nullable();
            $table->string('weight');
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
        Schema::dropIfExists('healths');
    }
}
