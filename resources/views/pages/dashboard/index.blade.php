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
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
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

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="card">
            <div class="header">
                <h2>STATUS KAS</h2>
            </div>
            <div class="body">
                <canvas id="pie_chart" height="290"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')

<script src="{{ asset('assets/plugins/chartjs/Chart.bundle.js') }}"></script>
<script>
    var ctx = document.getElementById("pie_chart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
                datasets: [{
                    data: ['{{ $kas_masuk }}', '{{ $kas_keluar }}'],
                    backgroundColor: [
                        "rgb(233, 30, 99)",
                        "rgb(0, 188, 212)",
                    ],
                }],
                labels: [
                    "Kas Masuk",
                    "Kas Keluar"
                ]
            },
            options: {
                responsive: true,
                legend: false
            }
		});
</script>
@endpush