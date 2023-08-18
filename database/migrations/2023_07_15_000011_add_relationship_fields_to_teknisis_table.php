<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTeknisisTable extends Migration
{
    public function up()
    {
        Schema::table('teknisis', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8755242')->references('id')->on('users');
            $table->unsignedBigInteger('layanan_id')->nullable();
            $table->foreign('layanan_id', 'layanan_fk_85276412')->references('id')->on('layanans');
        });
    }
}