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

    // Add the wishlists relationship
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'eventreq_id');
    }

    // Buat relasi one-to-one dengan model payment pada kolom harga
    public function payment()
    {
        return $this->hasOne(Payment::class, 'harga', 'id');
    }
}
