<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mixings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('mixings', function (Blueprint $table) {
            $table->id();

            #menambahkan kolom ke tabel transactions
            $table->bigInteger('users_id');
            $table->string('name')->nullable();
            $table->bigInteger('total_price')->default(0);
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
        //
    }
}
