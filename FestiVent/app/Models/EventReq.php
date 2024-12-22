<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReq extends Model
{
    use HasFactory;

    protected $table = "eventreq";

    protected $fillable = [
        'nama_event',
        'deskripsi',
        'lokasi',
        'waktu',       // Updated: 'waktu' is now a timestamp
        'tanggal',     // Added: New column for date
        'harga',
        'penyelenggara',
        'poster'       // Added: New column for image filename
    ];
}
