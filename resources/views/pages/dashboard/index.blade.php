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
                <i class="material-icons">forum</i>
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
                <i class="material-icons">bookmark</i>
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

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>AKTIFITAS TERBARU</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kas_terbaru as $kas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kas->description }}</td>
                                <td>{!! ($kas->type->id == 1 ? '<span class="label bg-pink">Kas Masuk</span>' : '<span
                                        class="label bg-cyan">Kas Keluar</span>') !!}</td>
                                <td>{{ $kas->getTanggalIndo() }}</td>
                                <td>{{ $kas->getTotalRupiah() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>KAS MASUK/BULAN</h2>
            </div>
            <div class="body">
                <div id="bar_chart_masuk" class="graph"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>KAS KELUAR/BULAN</h2>
            </div>
            <div class="body">
                <div id="bar_chart_keluar" class="graph"></div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>KAS BULAN INI</h2>
            </div>
            <div class="body">
                <div id="donut_chart_bulan_ini" class="graph"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>KAS KESELURUHAN</h2>
            </div>
            <div class="body">
                <div id="donut_chart" class="graph"></div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('after-script')
<link rel="stylesheet" href="{{ asset('assets/plugins/morrisjs/morris.css') }}">
<script src="{{ asset('assets/plugins/raphael/raphael.js') }}"></script>
<script src="{{ asset('assets/plugins/morrisjs/morris.js') }}"></script>
<script>
    $(function () {
        getMorris('bar_masuk', 'bar_chart_masuk');
        getMorris('bar_keluar', 'bar_chart_keluar');
        getMorris('donut_keseluruhan', 'donut_chart');
        getMorris('donut_bulan_ini', 'donut_chart_bulan_ini');
        $('#donut_chart').css("height", 365);
        $('#donut_chart_bulan_ini').css("height", 365);
    });

function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}


function getMorris(type, element) {
    if (type === 'donut_keseluruhan') {
        Morris.Donut({
            element: element,
            data: {!! $donut !!},
            colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)'],
            formatter: function (y) {
                return  'Rp. ' + number_format(y, 2 , ',','.');
            }
        });
    } else if(type === 'bar_masuk') {
        Morris.Bar({
            element: element,
            data: {!! $kas_masuk_per_bulan !!},
            xkey: 'month',
            ykeys: ['total'],
            labels: ['Total'],
            barColors: ['rgb(233, 30, 99)'],
        });
    } else if(type === 'bar_keluar') {
        Morris.Bar({
            element: element,
            data: {!! $kas_keluar_per_bulan !!},
            xkey: 'month',
            ykeys: ['total'],
            labels: ['Total'],
            barColors: ['rgb(0, 188, 212)'],
        });
    } else if(type === 'donut_bulan_ini') {
        Morris.Donut({
            element: element,
            data: {!! $kas_bulan_ini !!},
            colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)'],
            formatter: function (y) {
                return  'Rp. ' + number_format(y, 2 , ',','.');
            }
        });
    }
}
</script>
@endpush