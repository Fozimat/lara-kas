<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kas_masuk = Cash::where('type_id', 1)->sum('total');
        $kas_keluar = Cash::where('type_id', 2)->sum('total');
        $kas = $kas_masuk - $kas_keluar;
        $total_data = Cash::count();
        return view('pages.dashboard.index', compact(['kas_masuk', 'kas_keluar', 'kas', 'total_data']));
    }
}
