<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\EventReq;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $accounts_id = 1;
        
        $wishlist_items = Wishlist::with('event')
            ->where('accounts_id', $accounts_id)
            ->get();
            
        return view('Wishlist.index', compact('wishlist_items'));
    }

    public function toggle($eventreq_id)
    {
        $accounts_id = 1;
        
        $existing_wishlist = Wishlist::where('accounts_id', $accounts_id)
            ->where('eventreq_id', $eventreq_id)
            ->first();
            
        if ($existing_wishlist) {
            $existing_wishlist->delete();
            $message = 'Event removed from wishlist';
        } else {
            Wishlist::create([
                'accounts_id' => $accounts_id,
                'eventreq_id' => $eventreq_id
            ]);
            $message = 'Event added to wishlist';
        }
        
        return back()->with('success', $message);
    }

    public function remove($eventreq_id)
    {
        $accounts_id = 1;
        
        Wishlist::where('accounts_id', $accounts_id)
            ->where('eventreq_id', $eventreq_id)
            ->delete();
            
        return back()->with('success', 'Event removed from wishlist');
    }
} 