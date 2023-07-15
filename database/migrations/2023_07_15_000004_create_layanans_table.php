<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayanansTable extends Migration
{
    public function up()
    {
        Schema::create('layanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('layanan');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}