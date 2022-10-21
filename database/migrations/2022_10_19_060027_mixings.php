<?php

use App\Models\User;
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
            $table->foreignIdFor(User::class);
            $table->bigInteger('protein');
            $table->bigInteger('lemak');
            $table->bigInteger('kasar');
            $table->bigInteger('energi');
            $table->bigInteger('ca');
            $table->bigInteger('p');
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
