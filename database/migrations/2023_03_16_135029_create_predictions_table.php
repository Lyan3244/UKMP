<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->integer('penjualan_max');
            $table->integer('penjualan_min');
            $table->integer('persediaan_max');
            $table->integer('persediaan_min');
            $table->integer('cetak_max');
            $table->integer('cetak_min');
            $table->integer('banyak_terjual');
            $table->integer('persediaan_buku');
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
        Schema::dropIfExists('predictions');
    }
};
