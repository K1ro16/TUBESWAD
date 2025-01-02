<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistGroup extends Model
{
    protected $fillable = ['name', 'accounts_id'];
    
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'group_id');
    }
} 