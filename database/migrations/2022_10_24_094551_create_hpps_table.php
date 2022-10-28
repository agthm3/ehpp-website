<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hpps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('code');
            $table->bigInteger('bangunan');
            $table->bigInteger('pulet');
            $table->bigInteger('afkir');
            $table->bigInteger('deplesi');
            $table->bigInteger('produksi');
            $table->bigInteger('tenaga');
            $table->bigInteger('ovk');
            $table->bigInteger('pln');
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
        Schema::dropIfExists('hpps');
    }
}
