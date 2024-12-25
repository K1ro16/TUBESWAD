<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReq extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow the default pluralization convention
    protected $table = 'eventreq';

    protected $fillable = [
        'nama_event',
        'deskripsi',
        'lokasi',
        'waktu',
        'tanggal',
        'harga',
        'penyelenggara',
        'poster',
        'category',
    ];
}
