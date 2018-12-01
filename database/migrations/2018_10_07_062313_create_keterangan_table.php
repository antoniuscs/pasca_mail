<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeteranganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('surat_keterangan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat',30);
            $table->string('perihal',50);
            $table->string('alamat_surat',250);            
            $table->integer('mahasiswa')->unsigned();
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->string('keterangan');
            $table->integer('staf_penginput')->unsigned();
            $table->integer('staf_pemberi')->unsigned();
            $table->char('status',2);  
            $table->timestamps();

            $table->foreign('mahasiswa')->references('id')->on('mahasiswa')->onDelete('CASCADE');
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
        Schema::dropIfExists('surat_keterangan');
    }
}
