<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use Barryvdh\DomPDF\Facade as PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('pages.laporan.index');
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
}
