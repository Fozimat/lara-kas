<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\Type;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('pages.laporan.index', compact(['types']));
    }

    public function cetak_keseluruhan()
    {
        $cash = Cash::with(['type'])->get();
        $pdf = PDF::loadview('reports.cetak_keseluruhan', compact(['cash']));
        return $pdf->stream();
    }

    public function cetak_cash_masuk()
    {
        $cash_masuk = Cash::where('type_id', 1)->get();
        $pdf = PDF::loadview('reports.cetak_cash_masuk', compact(['cash_masuk']));
        return $pdf->stream();
    }

    public function cetak_cash_keluar()
    {
        $cash_keluar = Cash::where('type_id', 1)->get();
        $pdf = PDF::loadview('reports.cetak_cash_keluar', compact(['cash_keluar']));
        return $pdf->stream();
    }

    public function cetak_periode(Request $request)
    {
        $tanggal = $request->tanggal;
        $sampai = $request->sampai;
        $type = $request->type;
        $query = Cash::with(['type'])->whereBetween('date', [$tanggal, $sampai])->where('type_id', '=', $type)->orderBy('date', 'asc')->get();

        $pdf = PDF::loadview('reports.cetak_periode', compact(['query']));
        return $pdf->stream();
    }
}
