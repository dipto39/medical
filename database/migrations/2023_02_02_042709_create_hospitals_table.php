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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id("hid");
            $table->string("hname");
            $table->string("hemail");
            $table->string("hpass");
            $table->string("haddress")->nullable();
            $table->string("hlocation")->nullable();
            $table->integer("hstatus")->default(0);
            $table->string("hverify");
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
        Schema::dropIfExists('hospitals');
    }
};
