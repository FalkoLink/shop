<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_value', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->unsigned()->constrained('products');
            $table->foreignId('value_id')->unsigned()->constrained('values');
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
        Schema::table('product_value', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['value_id']);
        });
        Schema::dropIfExists('product_value');
    }
}
