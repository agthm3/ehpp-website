<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakan', function (Blueprint $table) {
                      #membuat tabel untuk product (berdasarkan ERD)
            $table->string('name');
            $table->longText('description');
            $table->bigInteger('price');
            $table->bigInteger('protein');
            $table->bigInteger('lemak');
            $table->bigInteger('serat');
            $table->bigInteger('energi');
            $table->bigInteger('ca');
            $table->bigInteger('p');
            $table->string('slug')->unique();
            $table->softDeletes();
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
        Schema::dropIfExists('pakan');
    }
}
