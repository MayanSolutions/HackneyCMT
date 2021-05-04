<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->Integer('client_id');
            $table->dateTime('agm_date');
            $table->string('elected_name');
            $table->string('position')->nullable();
            $table->string('elected_email')->nullable();
            $table->string('elected_contact')->nullable();
            $table->dateTime('position_exp_date');
            $table->dateTime('deletion_date')->nullable();
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
        Schema::dropIfExists('members');
    }
}
