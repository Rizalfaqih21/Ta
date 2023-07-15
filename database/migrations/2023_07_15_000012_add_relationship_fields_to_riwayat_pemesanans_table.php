<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRiwayatPemesanansTable extends Migration
{
    public function up()
    {
        Schema::table('riwayat_pemesanans', function (Blueprint $table) {
            $table->unsignedBigInteger('pemesanan_id')->nullable();
            $table->foreign('pemesanan_id', 'pemesanan_fk_8755131')->references('id')->on('pemesanans');
            $table->unsignedBigInteger('teknisi_id')->nullable();
            $table->foreign('teknisi_id', 'teknisi_fk_8755132')->references('id')->on('teknisis');
        });
    }
}