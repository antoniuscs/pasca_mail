<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->char('npm',10)->unique();
            $table->string('nama_lengkap',100);
            $table->integer('prodi')->unsigned();
            $table->string('tempat_lahir',50);
            $table->date('tanggal_lahir');
            $table->string('agama',20);
            $table->char('jenis_kelamin',2);
            $table->date('awal_studi');
            $table->string('alamat',250);
            $table->char('no telp',13);
            $table->string('email')->unique();
            $table->char('status',2);
            $table->timestamps();

            $table->foreign('prodi')->references('id')->on('prodi')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
