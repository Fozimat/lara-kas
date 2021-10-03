@extends('layouts.admin')
@section('title', 'Kas Masuk')
@section('content')
<div class="block-header">
    <h2>KAS MASUK</h2>
</div>
@if(session('status'))
<div class="alert bg-green alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">×</span></button>
    {{ session('status') }}
</div>
@endif

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <a href="{{ route('pemasukan.create') }}" class="btn btn-success">Tambah</a>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script>
    $(() => {
           $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! url()->current() !!}'
            },
            columns: [
                { data: 'DT_RowIndex', name: 'id', width: '5%' },
                { data: 'description', name: 'description'},
                { data: 'date', name: 'date' },
                { data: 'total', name: 'total' },
                { data: 'type_id', name: 'type_id' },
                { 
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                 }
            ]
           });
       });
</script>
@endpush