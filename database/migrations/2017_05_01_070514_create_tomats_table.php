<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTomatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tomats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('images');
            $table->string('nama');
            $table->string('family');
            $table->date('tanggal_tanam');
            $table->string('usia');
            $table->string('hama');
            $table->string('syarat_tumbuh');
            $table->string('pemeliharaan');
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
        Schema::dropIfExists('tomats');
    }
}
