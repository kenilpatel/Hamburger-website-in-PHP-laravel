<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHamburgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('hamburgers', function (Blueprint $table) {
            $table->string('shopid')->length(20);
            $table->string('name')->length(50);
            $table->mediumText('photo');
            $table->mediumText('bread_type');
            $table->mediumText('recipies');
            $table->integer('total_sold')->length(11);
            $table->float('price');
            $table->increments('burgerid')->length(50);
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hamburgers');
    }
}
