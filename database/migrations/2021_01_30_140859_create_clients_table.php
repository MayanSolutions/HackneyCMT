<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_organisation');
            $table->string('client_address');
            $table->string('client_pfn_email')->unique();
            $table->string('client_pfn');
            $table->string('client_manager');
            $table->string('client_manager_contact');
            $table->string('client_manager_email');
            $table->string('client_deputy');
            $table->integer('user_id')->unsigned()->index()->nullable();
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
        Schema::dropIfExists('clients');
    }
}
