<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPemesanansTable extends Migration
{
    public function up()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8755093')->references('id')->on('users');
            $table->unsignedBigInteger('layanan_id')->nullable();
            $table->foreign('layanan_id', 'layanan_fk_8755094')->references('id')->on('layanans');
        });
    }
}