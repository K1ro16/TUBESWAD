<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReq extends Model
{
    //
    use HasFactory;

    protected $table = "eventreq";

    protected $fillable = [
        'nama_event',
        'deskripsi',
        'lokasi',
        'waktu',
        'harga',
        'penyelenggara'
    ];
}
