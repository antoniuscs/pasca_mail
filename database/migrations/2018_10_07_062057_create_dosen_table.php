<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('dosen', function (Blueprint $table) {
            $table->increments('id');
            $table->char('npp',10)->unique();
            $table->string('nama_dosen',100);
            $table->string('fakultas',50);
            $table->string('jabatan_akademik',50);
            $table->string('jabatan_fungsional',50);
            $table->char('status',2);
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
        Schema::dropIfExists('dosen');
    }
}
