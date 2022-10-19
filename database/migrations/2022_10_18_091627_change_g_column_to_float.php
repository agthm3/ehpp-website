<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeGColumnToFloat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pakans', function (Blueprint $table) {
            $table->float('gprotein',3)->nullable()->change();
            $table->float('glemak',3)->nullable()->change();
            $table->float('gkasar',3)->nullable()->change();
            $table->float('genergi',3)->nullable()->change();
            $table->float('gca',3)->nullable()->change();
            $table->float('gp',3)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pakans', function (Blueprint $table) {
            //
        });
    }
}
