<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap',100);
            $table->string('nama_panggilan',20);
            $table->char('angkatan',5);
            $table->string('prodi',50);
            $table->char('npm',10)->unique();
            $table->string('divisi',50);
            $table->string('jabatan',50);
            $table->date('periode_awal');
            $table->date('periode_akhir');
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
        Schema::dropIfExists('student_staff');
    }
}
