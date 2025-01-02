<?php

namespace App\Http\Controllers;

use App\Models\EventReq;
use App\Models\Community;
use App\Models\Promosi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $events = EventReq::orderBy('tanggal', 'desc')->get();
        $communities = Community::all();
        $promosi = Promosi::where('tanggal_selesai', '>=', now())->get();

        return view('Admin.dashboard', compact('events', 'communities', 'promosi'));
    }
} 