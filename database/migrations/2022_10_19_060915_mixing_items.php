<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MixingItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mixing_items', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('users_id');
            $table->bigInteger('pakans_id');
            $table->bigInteger('mixing_id');
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
            Schema::dropIfExists('mixing_items');
    }
}
