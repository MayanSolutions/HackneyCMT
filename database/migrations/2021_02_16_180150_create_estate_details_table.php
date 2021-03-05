<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id');
            $table->mediumInteger('no_of_units');
            $table->mediumInteger('leaseholders');
            $table->mediumInteger('freeholders');
            $table->mediumInteger('tenants');
            $table->mediumInteger('comm_halls');
            $table->mediumInteger('outside_areas');
            $table->mediumInteger('communal_facilities');
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
        Schema::dropIfExists('estate_details');
    }
}
