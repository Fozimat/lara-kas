@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="block-header">
    <h2>DASHBOARD</h2>
</div>
@push('after-style')
<style>
    .number {
        font-size: 20px !important;
    }
</style>
@endpush
<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">playlist_add_check</i>
            </div>
            <div class="content">
                <div class="text">KAS MASUK</div>
                <div class="number">Rp.{{ number_format($kas_masuk,2,',','.') }}
                </div>
            </div>
        </div>
    </div>
    <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">help</i>
            </div>
            <div class="content">
                <div class="text">KAS KELUAR</div>
                <div class="number">Rp.{{ number_format($kas_keluar,2,',','.') }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">forum</i>
            </div>
            <div class="content">
                <div class="text">KAS TERSISA</div>
                <div class="number">Rp.{{ number_format($kas,2,',','.') }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">person_add</i>
            </div>
            <div class="content">
                <div class="text">DATA KAS</div>
                <div class="number">{{ $total_data }} Data
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Widgets -->
@endsection