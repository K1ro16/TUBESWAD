<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_event',
        'deskripsi',
        'lokasi',
        'waktu',
        'harga',
        'community_id',
    ];

    /**
     * Relasi ke Community.
     * Satu event hanya dimiliki oleh satu komunitas.
     */
    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
