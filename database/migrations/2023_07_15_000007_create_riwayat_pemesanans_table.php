<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPemesanansTable extends Migration
{
    public function up()
    {
        Schema::create('riwayat_pemesanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}