<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakans', function (Blueprint $table) {
             $table->id();
                      #membuat tabel untuk product (berdasarkan ERD)
            $table->string('name');
            $table->longText('description');
            $table->bigInteger('price');
            $table->string('protein');
            $table->string('lemak');
            $table->string('serat');
            $table->string('energi');
            $table->string('ca');
            $table->string('p');
            $table->string('slug')->unique();
          
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
        Schema::dropIfExists('pakans');
    }
}
