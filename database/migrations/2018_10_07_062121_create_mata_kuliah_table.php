<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMataKuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kode_makul',10)->unique();
            $table->string('nama_makul',100);
            $table->char('kelas',2);
            $table->integer('jumlah_sks');
            $table->integer('dosen')->unsigned();
            $table->char('status',2);
            $table->timestamps();

            $table->foreign('dosen')->references('id')->on('dosen')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_kuliah');
    }
}
