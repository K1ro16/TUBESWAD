<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['accounts_id', 'eventreq_id', 'group_id'];
    
    public function event()
    {
        return $this->belongsTo(EventReq::class, 'eventreq_id');
    }

    public function group()
    {
        return $this->belongsTo(WishlistGroup::class, 'group_id');
    }
} 