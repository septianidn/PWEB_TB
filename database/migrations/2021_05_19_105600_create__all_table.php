<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_kelas',50);
            $table->string('kode_matkul',50);
            $table->string('nama_matkul',50);
            $table->integer('tahun');
            $table->integer('semester');
            $table->integer('sks');
            $table->timestamps();
        });

        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50);
            $table->string('nim', 10)->unique();
            $table->string('email')->unique();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        Schema::table('mahasiswa', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('krs', function (Blueprint $table) {
            $table->increments('krs_id');
            $table->unsignedInteger('kelas_id');
            $table->unsignedInteger('mahasiswa_id');
            $table->timestamps();

            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
        });

        Schema::create('pertemuan', function (Blueprint $table) {
            $table->increments('pertemuan_id');
            $table->unsignedInteger('krs_id');
            $table->integer('pertemuan_ke');
            $table->string('materi', 50);
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('krs_id')->references('krs_id')->on('krs')->onDelete('cascade');
        });

        Schema::create('absensi', function (Blueprint $table) {
            $table->increments('absensi_id');
            $table->unsignedInteger('krs_id');
            $table->unsignedInteger('pertemuan_id');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->integer('durasi');
            $table->timestamps();

            $table->foreign('krs_id')->references('krs_id')->on('krs')->onDelete('cascade');
            $table->foreign('pertemuan_id')->references('pertemuan_id')->on('pertemuan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('mahasiswa');
        Schema::dropIfExists('krs');
        Schema::dropIfExists('pertemuan');
        Schema::dropIfExists('absensi');
    }
}
