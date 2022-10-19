<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAllPakansColumnsToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pakans', function (Blueprint $table) {
         
            $table->longText('description')->nullable()->change();
            $table->bigInteger('price')->nullable()->change();
            $table->bigInteger('protein')->nullable()->change();
            $table->bigInteger('lemak')->nullable()->change();
            $table->bigInteger('serat')->nullable()->change();
            $table->bigInteger('energi')->nullable()->change();
            $table->bigInteger('ca')->nullable()->change();
            $table->bigInteger('p')->nullable()->change();
            $table->string('slug')->nullable()->change();
            $table->bigInteger('mixing')->nullable()->change();
     
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
