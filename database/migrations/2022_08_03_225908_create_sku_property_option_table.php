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
        Schema::create('sku_property_option', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_option_id', false,true);
            $table->bigInteger('sku_id', false,true);
            $table->timestamps();

            $table->foreign('sku_id')->references('id')->on('skus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('property_option_id')->references('id')->on('property_options')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sku_property_option');
    }
};
