<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->dateTime('tgl_mulai');
            $table->dateTime('tgl_berakhir');
            $table->string('pakaian');
            $table->string('tempat');
            $table->string('penyelenggara');
            $table->string('penjabat_menghadiri');
            $table->foreignId('protokol')->constrained('pegawai');
            $table->foreignId('kopim')->constrained('pegawai');
            $table->foreignId('dokpim')->constrained('pegawai');
            $table->string('keterangan');
            $table->foreignId('calendar_id')->constrained('calendar_service');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
