<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAsetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_aset', function (Blueprint $table) {
            $table->id('id_aset');
            $table->integer('id_pengguna');
            $table->integer('id_kategori');
            $table->string('nama_aset');
            $table->enum('status_aset',['On Going','Finished']);
            $table->string('link_project');
            $table->string('deskripsi_aset');
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
        Schema::dropIfExists('tb_aset');
    }
}
