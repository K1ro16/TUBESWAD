<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'judul',
        'deskripsi',
        'diskon',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];
    

    protected $table = 'promosi';

    // relasi ke model payment



    public function payment()
    {
        return $this->hasMany(Payment::class, 'kode', 'id');
    }
}
