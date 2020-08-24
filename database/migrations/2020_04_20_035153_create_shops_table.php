<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
             $table->string('shopid')->length(20);
            $table->string('telephone_no')->length(20);
            $table->string('email')->length(50);
            $table->string('linkedin')->length(50);
            $table->string('facebook')->length(50);
            $table->string('twitter')->length(50);
            $table->string('printrest')->length(50);
            $table->mediumText('address');
            $table->mediumText('logo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
