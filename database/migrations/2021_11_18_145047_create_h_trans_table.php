<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_trans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->bigInteger('total');
            $table->bigInteger('metode'); // 0 transfer, 1 point
            $table->bigInteger('status'); // 0 menunggu bukti transfer // 1 menunggu konfirmasi bukti admin // 99 cancelled
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
        Schema::dropIfExists('h_trans');
    }
}
