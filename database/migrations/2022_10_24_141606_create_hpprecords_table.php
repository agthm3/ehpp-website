<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
class CreateHpprecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hpprecords', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignIdFor(User::class);
            $table->string('hargapulet');
            $table->string('afkir_per_ekor');
            $table->string('deplesi_harga');
            $table->string('total_biaya_ayam');
            $table->string('total_harga');
            $table->string('biaya_pakan');
            $table->string('biaya_pakan_per_rak');
            $table->string('tenaga_kerja_per_rak');
            $table->string('tenaga_kerja_ekor_per_bulan');
            $table->string('ovk_per_rak');
            $table->string('ovk_ekor_per_bulan');
            $table->string('pln_per_rak');
            $table->string('pln_ekor_per_bulan');
            $table->string('hpp');
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
        Schema::dropIfExists('hpprecords');
    }
}
