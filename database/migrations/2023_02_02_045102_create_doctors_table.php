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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id("did");
            $table->string("dname");
            $table->string("demail");
            $table->string("dpass");
            $table->string("dphn");
            $table->string("dhospital");
            $table->string("dposition");
            $table->string("bmdc");
            $table->string("dimg");
            $table->string("degree")->nullable();
            $table->string("specail")->nullable();
            $table->integer("status")->default(0);
            $table->string("hverify")->nullable();
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
        Schema::dropIfExists('doctors');
    }
};
