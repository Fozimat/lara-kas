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
            ->groupBy('type_id')
            ->get()->toJson();

        $month = Carbon::now()->month;

        $kas_bulan_ini = Cash::select(DB::raw("types.type as label, SUM(total) as value"))
            ->join('types', 'cashes.type_id', '=', 'types.id')
            ->whereMonth('date', '=', $month)
            ->groupBy('type_id')
            ->get()->toJson();

        $kas_masuk_per_bulan = Cash::select(
            "types.type",
            DB::raw("(sum(total)) as total"),
            DB::raw("(DATE_FORMAT(date, '%m-%Y')) as month")
        )
            ->join('types', 'cashes.type_id', '=', 'types.id')
            ->orderBy('date')
            ->groupBy(DB::raw("DATE_FORMAT(date, '%m-%Y')"), DB::raw('type_id'))
            ->where('cashes.type_id', '=', '1')
            ->get()->toJson();

        $kas_keluar_per_bulan = Cash::select(
            "types.type",
            DB::raw("(sum(total)) as total"),
            DB::raw("(DATE_FORMAT(date, '%m-%Y')) as month")
        )
            ->join('types', 'cashes.type_id', '=', 'types.id')
            ->orderBy('date')
            ->groupBy(DB::raw("DATE_FORMAT(date, '%m-%Y')"), DB::raw('type_id'))
            ->where('cashes.type_id', '=', '2')
            ->get()->toJson();

        return view('pages.dashboard.index', compact(['kas_masuk', 'kas_keluar', 'kas', 'total_data', 'kas_terbaru', 'donut', 'kas_masuk_per_bulan', 'kas_keluar_per_bulan', 'kas_bulan_ini']));
    }
}
