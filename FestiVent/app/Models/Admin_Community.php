<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_community',
        'asal',
        'deskripsi',
        'gambar',
        'kategori',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}