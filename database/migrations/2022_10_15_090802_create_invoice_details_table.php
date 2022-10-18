<?php

use App\Models\Invoice;
use App\Models\Product;
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
        Schema::create('invoce_details', function (Blueprint $table) {
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Invoice::class);
            $table->integer('quantity');
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
        Schema::dropIfExists('invoce_details');
    }
};
