<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistGroup extends Model
{
    protected $fillable = ['name', 'accounts_id'];
    
    // Relasi ke model Wishlist
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'group_id');
    }
} 