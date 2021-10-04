<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $kas_masuk = Cash::where('type_id', 1)->sum('total');
        $kas_keluar = Cash::where('type_id', 2)->sum('total');
        $kas = $kas_masuk - $kas_keluar;
        $total_data = Cash::count();
        $kas_terbaru = Cash::with(['type'])->orderBy('date', 'DESC')->limit(5)->get();

        $donut = Cash::select(DB::raw("types.type as label, SUM(total) as value"))
            ->join('types', 'cashes.type_id', '=', 'types.id')
            ->groupBy('type_id')
            ->get()->toJson();

        $year = Cash::select('date as label', 'total as value')->get()->toJson(JSON_PRETTY_PRINT);
        // dd($year);

        return view('pages.dashboard.index', compact(['kas_masuk', 'kas_keluar', 'kas', 'total_data', 'kas_terbaru', 'donut']));
    }
}
