<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('prodi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_prodi',100);
            $table->char('inisial_prodi',3);
            $table->char('kode_prodi',3)->unique();
            $table->char('kode_arsip_surat',3);
            $table->integer('kaprodi')->unsigned();
			$table->binary('tanda_tangan_kaprodi');
            $table->char('status',2);
            $table->timestamps();

            $table->foreign('kaprodi')->references('id')->on('dosen')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prodi');
    }
}
