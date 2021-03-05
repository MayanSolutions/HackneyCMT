<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatergoryFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_matrix_function', function (Blueprint $table) {
            $table->foreignId('function_id')->references('id')->on('matrix_functions')->cascadeOnDelete();
            $table->foreignId('client_id')->references('id')->on('clients')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catergory_functions');
    }
}
