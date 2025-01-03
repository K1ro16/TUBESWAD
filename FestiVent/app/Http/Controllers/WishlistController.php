<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\WishlistGroup;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $accounts_id = 1;
        
        $groups = WishlistGroup::where('accounts_id', $accounts_id)->get();
        $ungrouped_items = Wishlist::with('event')
            ->where('accounts_id', $accounts_id)
            ->whereNull('group_id')
            ->get();
            
        return view('Wishlist.index', compact('groups', 'ungrouped_items'));
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

    public function createGroup(Request $request)
    {
        $accounts_id = 1;
        
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        
        WishlistGroup::create([
            'name' => $request->name,
            'accounts_id' => $accounts_id
        ]);
        
        return back()->with('success', 'Group created successfully');
    }

    public function moveToGroup(Request $request, $wishlist_id)
    {
        $wishlist = Wishlist::findOrFail($wishlist_id);
        $wishlist->update(['group_id' => $request->group_id]);
        
        return back()->with('success', 'Item moved to group');
    }

    public function remove($eventreq_id)
    {
        $accounts_id = 1; // Or however you're getting the account ID
        
        $wishlist = Wishlist::where('accounts_id', $accounts_id)
            ->where('eventreq_id', $eventreq_id)
            ->firstOrFail();
            
        $wishlist->delete();
        
        return back()->with('success', 'Event removed from wishlist');
    }

    public function printGroup(WishlistGroup $group)
    {
        // Load the group with its wishlists and event details
        $group->load(['wishlists.event']);
        
        return view('Wishlist.print.group', [
            'group' => $group
        ]);
    }
} 