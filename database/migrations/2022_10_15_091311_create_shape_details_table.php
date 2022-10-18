<?php

use App\Models\Product;
use App\Models\Shape;
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
        Schema::create('shape_details', function (Blueprint $table) {
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Shape::class);
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
        Schema::dropIfExists('shape_details');
    }
};
