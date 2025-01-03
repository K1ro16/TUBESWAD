<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\WishlistGroup;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    // Menampilkan halaman utama wishlist
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

    // Menambah/menghapus event dari wishlist
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

    // Membuat grup wishlist
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

    // Memindahkan item wishlist ke grup
    public function moveToGroup(Request $request, $wishlist_id)
    {
        $wishlist = Wishlist::findOrFail($wishlist_id);
        $wishlist->update(['group_id' => $request->group_id]);
        
        return back()->with('success', 'Item moved to group');
    }

    // Menghapus event dari wishlist
    public function remove($eventreq_id)
    {
        $accounts_id = 1;
        
        $wishlist = Wishlist::where('accounts_id', $accounts_id)
            ->where('eventreq_id', $eventreq_id)
            ->firstOrFail();
            
        $wishlist->delete();
        
        return back()->with('success', 'Event removed from wishlist');
    }

    // print daftar wishlist dalam grup
    public function printGroup(WishlistGroup $group)
    {
        $group->load(['wishlists.event']);
        
        return view('Wishlist.print.group', [
            'group' => $group
        ]);
    }
} 