<?php

namespace App\Http\Controllers;

use App\Models\EventReq;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $eventreqs = EventReq::all();
        $wishlisted = [];
        
        if (session('accounts_id')) {
            $wishlisted = Wishlist::where('accounts_id', session('accounts_id'))
                ->pluck('eventreq_id')
                ->toArray();
        }
        
        return view('home', compact('eventreqs', 'wishlisted'));
    }
} 