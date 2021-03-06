<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cash;
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
            ->groupBy('type_id', 'types.type')
            ->get()->toJson();

        $month = Carbon::now()->month;

        $kas_bulan_ini = Cash::select(DB::raw("types.type as label, SUM(total) as value"))
            ->join('types', 'cashes.type_id', '=', 'types.id')
            ->whereMonth('date', '=', $month)
            ->groupBy('type_id', 'types.type')
            ->get()->toJson();

        $kas_masuk_per_bulan = json_encode(DB::select("SELECT types.type, SUM(total) AS total, DATE_TRUNC('month',date)::date
        AS month FROM cashes INNER JOIN types 
        on cashes.type_id = types.id where cashes.type_id = 1 
        GROUP BY DATE_TRUNC('month', date), types.type"));

        $kas_keluar_per_bulan = json_encode(DB::select("SELECT types.type, SUM(total) AS total, DATE_TRUNC('month',date)::date
        AS month FROM cashes INNER JOIN types 
        on cashes.type_id = types.id where cashes.type_id = 2 
        GROUP BY DATE_TRUNC('month', date), types.type"));

        return view('pages.dashboard.index', compact(['kas_masuk', 'kas_keluar', 'kas', 'total_data', 'kas_terbaru', 'donut', 'kas_masuk_per_bulan', 'kas_keluar_per_bulan', 'kas_bulan_ini']));
    }
}
