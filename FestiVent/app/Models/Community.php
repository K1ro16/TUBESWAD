<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_community',
        'asal',
        'deskripsi',
        'gambar',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}