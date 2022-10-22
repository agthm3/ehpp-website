<?php

use App\Models\Record;
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
            $table->string('code');
            $table->float('protein',3);
            $table->float('lemak',3);
            $table->float('kasar',3);
            $table->float('energi',3);
            $table->float('ca',3);
            $table->float('p',3);
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
