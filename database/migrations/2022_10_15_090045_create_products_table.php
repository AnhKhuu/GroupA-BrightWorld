<?php

use App\Models\Brand;
use App\Models\Country;
use App\Models\Sale;
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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', '250');
            $table->string('unit', '50');
            $table->decimal('price', 6, 3);
            $table->string('img_url');
            $table->string('description')->nullable();
            $table->integer('sold');
            $table->integer('in_stock');
            $table->timestamps();
            $table->foreignIdFor(Country::class);
            $table->foreignIdFor(Brand::class);
            $table->foreignIdFor(Sale::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
