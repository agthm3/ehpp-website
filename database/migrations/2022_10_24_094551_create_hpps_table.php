<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

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
            $table->string('bangunan');
            $table->string('pulet');
            $table->string('afkir');
            $table->string('deplesi');
            $table->string('produksi');
            $table->string('tenaga');
            $table->string('ovk');
            $table->string('pln');
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
