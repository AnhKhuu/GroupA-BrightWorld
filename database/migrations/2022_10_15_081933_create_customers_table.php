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
            $table->bigIncrements('id');
            $table->string('first_name', '100');
            $table->string('last_name', '100');
            $table->string('phone_number', '20');
            $table->string('address', '500');
            $table->string('zip', '10');
            $table->string('email')->unique();
            $table->string('user_name')->unique();
            $table->string('password', '20');
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
