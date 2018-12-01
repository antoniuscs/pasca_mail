<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUjianProposalTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian_proposal_tesis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_surat',30);
            $table->string('perihal',50);
            $table->integer('dosen_1')->unsigned();
            $table->integer('dosen_2')->unsigned();
            $table->integer('dosen_3')->unsigned();          
            $table->integer('mahasiswa')->unsigned();
            $table->date('tanggal_masuk_berkas');
            $table->binary('tanda_tangan_dosen');
            $table->datetime('waktu_ujian');
            $table->char('ruang_ujian',10);
            $table->integer('staf_penginput')->unsigned();
            $table->integer('staf_pemberi')->unsigned();
            $table->char('status',2);  
            $table->timestamps();

            $table->foreign('mahasiswa')->references('id')->on('mahasiswa')->onDelete('CASCADE');
            $table->foreign('dosen_1')->references('id')->on('dosen')->onDelete('CASCADE');
            $table->foreign('dosen_2')->references('id')->on('dosen')->onDelete('CASCADE');
            $table->foreign('dosen_3')->references('id')->on('dosen')->onDelete('CASCADE');
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
        Schema::dropIfExists('ujian_proposal_tesis');
    }
}
