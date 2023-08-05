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
        Schema::create('creports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("rid");
            $table->longText("rdetails");
            $table->integer("docid");    
            $table->foreign('rid')->references('rid')->on('reports');                      
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
        Schema::dropIfExists('creports');
    }
};
