<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('no_hp');
            $table->longText('alamat')->nullable();
            $table->string('nama_barang');
            $table->longText('deskripsi');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}