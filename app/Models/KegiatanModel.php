<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    protected $fillable = [
        'id', 'nama_kegiatan', 'tgl_mulai',
        'tgl_berakhir', 'pakaian', 'tempat',
        'penyelenggara', 'penjabat_menghadiri',
        'protokol', 'kopim', 'dokpim', 'keterangan',
        'calendar_id'
    ];

    public function protokolRole()
    {
        return $this->belongsTo(PegawaiModel::class, 'protokol')->select(array('id', 'nama'));
    }

    public function kopimRole()
    {
        return $this->belongsTo(PegawaiModel::class, 'kopim')->select(array('id', 'nama'));
    }

    public function dokpimRole()
    {
        return $this->belongsTo(PegawaiModel::class, 'kopim')->select(array('id', 'nama'));
    }
}
