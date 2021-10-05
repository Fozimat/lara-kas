@extends('layouts.admin')
@section('title', 'Laporan')
@push('after-style')
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}">
@endpush
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
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Cetak Laporan Berdasarkan Periode Tertentu
                </h2>
            </div>
            <div class="body">
                <div class="row">
                    <form action="{{ route('cetak_periode') }}" method="POST" target="_blank">
                        @csrf
                        @method('post')
                        <div class="col-sm-4">
                            <label>Tanggal</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="tanggal" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label>Sampai</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="sampai" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label>Jenis</label>
                            <select class="form-control show-tick" name="type" required>
                                <option value="">--Pilih Jenis--</option>
                                @foreach ($types as $type)
                                <option value="{{ $type->id }}">
                                    {{ ucwords($type->type) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-block bg-deep-orange waves-effect">
                            <i class="material-icons">print</i>
                            <span>PRINT</span>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
@endpush