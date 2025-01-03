<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'nama',
        'email',
        'pesan',
        'rating',
        'reply',
        'replied_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'replied_at'
    ];
}
