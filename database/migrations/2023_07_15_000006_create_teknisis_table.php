<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeknisisTable extends Migration
{
    public function up()
    {
        Schema::create('teknisis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('no');
            $table->longText('alamat');
            $table->string('keahlian');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}