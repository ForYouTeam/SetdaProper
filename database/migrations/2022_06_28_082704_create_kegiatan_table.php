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
            $table->foreignId('protokol')->nullable()->constrained('pegawai');
            $table->foreignId('kopim')->nullable()->constrained('pegawai');
            $table->foreignId('dokpim')->nullable()->constrained('pegawai');
            $table->string('keterangan');
            $table->string('calendar_id');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
