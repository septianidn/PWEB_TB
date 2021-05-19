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
            $table->integer('id')->primary();
            $table->string('kode_kelas',50);
            $table->string('kode_matkul',50);
            $table->string('nama_matkul',50);
            $table->integer('tahun');
            $table->integer('semester');
            $table->integer('sks');
            $table->timestamps();
        });

        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nama', 50);
            $table->string('nim', 18);
            $table->string('email', 50);
            $table->integer('tipe');
            $table->integer('password');
            $table->timestamps();
        });

        Schema::create('krs', function (Blueprint $table) {
            $table->integer('krs_id')->primary();
            $table->integer('kelas_id');
            $table->integer('mahasiswa_id');
            $table->timestamps();

            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
        });

        Schema::create('pertemuan', function (Blueprint $table) {
            $table->integer('pertemuan_id')->primary();
            $table->integer('krs_id');
            $table->integer('pertemuan_ke');
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('krs_id')->references('krs_id')->on('krs')->onDelete('cascade');
        });

        Schema::create('absensi', function (Blueprint $table) {
            $table->integer('absensi_id')->primary();
            $table->integer('krs_id');
            $table->integer('pertemuan_id');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
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