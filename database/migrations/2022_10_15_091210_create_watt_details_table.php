<?php

use App\Models\Product;
use App\Models\Watt;
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
        Schema::create('watt_details', function (Blueprint $table) {
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Watt::class);
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
        Schema::dropIfExists('watt_details');
    }
};
