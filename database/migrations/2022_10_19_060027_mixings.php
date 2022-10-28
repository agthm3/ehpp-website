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
            $table->string('protein');
            $table->string('lemak');
            $table->string('kasar');
            $table->string('energi');
            $table->string('ca');
            $table->string('p');
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
 Schema::dropIfExists('mixings');
    }
}
