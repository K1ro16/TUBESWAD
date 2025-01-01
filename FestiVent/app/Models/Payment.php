<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'nama',
        'no_tlp',
        'email',
        'jml_tiket',
        'harga',
        'opsi_pay',
        'kode',
    ];

    // relasi ke model promosi kolom judul
    public function promosi()
    {
        return $this->belongsTo(Promosi::class, 'kode', 'id');
    }

    // buat relasi one to one dengan model eventreq kolom harga
    // Di model Payment, pastikan ada relasi dengan EventReq
    public function eventreq()
    {
        return $this->hasOne(EventReq::class, 'harga', 'harga');
    }


}
