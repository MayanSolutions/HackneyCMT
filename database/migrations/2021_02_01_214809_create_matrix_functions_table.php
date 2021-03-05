<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrixFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrix_functions', function (Blueprint $table) {
            $table->id();
            $table->integer('matrix_category_id');
            $table->string('function')->nullable();
            $table->string('cost_code')->nullable();
            $table->string('subjective')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('matrix_functions');
    }
}
