<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan (opsional jika nama tabel tidak plural)
    protected $table = 'community';

    // Mass assignable fields
    protected $fillable = [
        'name',
        'city',
        'description',
        'category',
        'image_path',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'community_user');
    }

}
