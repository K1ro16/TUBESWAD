<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReq extends Model
{
    use HasFactory;
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

    // menambah relasi wishlist
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'eventreq_id');
    }

    // Buat relasi dengan model payment di kolom harga
    public function payment()
    {
        return $this->hasOne(Payment::class, 'harga', 'harga');
    }

}
