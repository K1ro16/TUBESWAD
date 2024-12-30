<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    use HasFactory;

    /**
     * Properti yang dapat diisi secara massal.
     */
    protected $fillable = [
        'judul',
        'deskripsi',
        'diskon',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    /**
     * Konversi atribut menjadi tipe data yang sesuai.
     */
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];
}
