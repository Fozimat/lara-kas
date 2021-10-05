@extends('layouts.admin')
@section('title', 'Laporan')
@section('content')
<div class="block-header">
    <h2>LAPORAN</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Cetak Laporan Keseluruhan
                </h2>
            </div>
            <div class="body">
                <a href="{{ route('cetak_keseluruhan') }}" target="_blank" class="btn btn-block bg-indigo waves-effect">
                    <i class="material-icons">print</i>
                    <span>PRINT</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Cetak Laporan Kas Masuk
                </h2>
            </div>
            <div class="body">
                <a href="{{ route('cetak_cash_masuk') }}" target="_blank" class="btn btn-block bg-cyan waves-effect">
                    <i class="material-icons">print</i>
                    <span>PRINT</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Cetak Laporan Kas Keluar
                </h2>
            </div>
            <div class="body">
                <a href="{{ route('cetak_cash_keluar') }}" target="_blank" class="btn btn-block bg-teal waves-effect">
                    <i class="material-icons">print</i>
                    <span>PRINT</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection