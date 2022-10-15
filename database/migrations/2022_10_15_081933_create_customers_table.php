<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->string('FirstName', '100');
            $table->string('LastName', '100');
            $table->string('PhoneNumber', '20');
            $table->string('Address', '500');
            $table->string('Zip', '10');
            $table->string('Email', '250')->unique();
            $table->string('Username', '20')->unique();
            $table->string('Password', '20');
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
        Schema::dropIfExists('customers');
    }
};
