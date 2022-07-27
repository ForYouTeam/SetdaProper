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
        'penyelenggara', 'pejabat_menghadiri',
        'protokol', 'kopim', 'dokpim', 'keterangan',
        'celendar_id'
    ];

    public function protokolRole()
    {
        return $this->belongsTo(PegawaiModel::class, 'protokol');
    }

    public function kopimRole()
    {
        return $this->belongsTo(PegawaiModel::class, 'kopim');
    }

    public function dokpimRole()
    {
        return $this->belongsTo(PegawaiModel::class, 'kopim');
    }

    public function calendarRole()
    {
        return $this->belongsTo(CalendarServiceModel::class, 'calendar_id');
    }
}
