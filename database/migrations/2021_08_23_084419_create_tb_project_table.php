<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_project', function (Blueprint $table) {
            $table->id('id_project');
            $table->integer('id_pengguna');
            $table->integer('id_aset');
            $table->string('bukti_project');
            $table->enum('peranan_project',['Project Leader','Contributor']);
            $table->string('deskripsi_project');
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
        Schema::dropIfExists('tb_project');
    }
}
