<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratIjinKuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('surat_ijin_kuliah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat',30);
            $table->string('lampiran',50);        
            $table->integer('mahasiswa')->unsigned();
            $table->date('tanggal_masuk');
            $table->date('tanggal_ijin');
            $table->string('keterangan_acara',100);
            $table->integer('mata_kuliah')->unsigned();
            $table->integer('staf_penginput')->unsigned();
            $table->integer('staf_pemberi')->unsigned();
            $table->char('status',2);  
            $table->timestamps();

            $table->foreign('mahasiswa')->references('id')->on('mahasiswa')->onDelete('CASCADE');
            $table->foreign('mata_kuliah')->references('id')->on('mata_kuliah')->onDelete('CASCADE');
            $table->foreign('staf_penginput')->references('id')->on('student_staff')->onDelete('CASCADE');
            $table->foreign('staf_pemberi')->references('id')->on('student_staff')->onDelete('CASCADE');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_ijin_kuliah');
    }
}
