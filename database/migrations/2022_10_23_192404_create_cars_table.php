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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('price')->default(0);
            $table->integer('anio');
            $table->integer('mileage')->default(0);
            $table->string('color')->default('blanco');
            $table->text('description')->nullable();
          
            // TIPOS
            $table->bigInteger('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');

            // MARCAS
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            
            // MODELOS
            $table->bigInteger('model_id')->unsigned()->nullable();
            $table->foreign('model_id')->references('id')->on('models')->onDelete('set null');

            // TRANSMISION
            $table->bigInteger('transmission_id')->unsigned()->nullable();
            $table->foreign('transmission_id')->references('id')->on('transmissions')->onDelete('set null');

            // COMBUSTIBLE
            $table->bigInteger('fuel_id')->unsigned()->nullable();
            $table->foreign('fuel_id')->references('id')->on('fuels')->onDelete('set null');
        
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
        Schema::dropIfExists('cars');
    }
};
