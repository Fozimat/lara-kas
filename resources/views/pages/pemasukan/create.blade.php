@extends('layouts.admin')
@section('title', 'Pemasukan')
@push('after-style')
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}">
@endpush
@section('content')
<div class="block-header">
    <h2>TAMBAH KAS MASUK</h2>
</div>
<!-- Input -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <a href="{{ route('pemasukan.index') }}" class="btn btn-info">Kembali</a>
            </div>
            <form action="{{ route('pemasukan.store') }}" method="POST">
                @csrf
                <input type="hidden" name="type_id" value="1">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <label>Deskripsi</label>
                            <div class="form-group">
                                <div class="form-line @error('description') focused error @enderror">
                                    <input type="text" class="form-control" name="description"
                                        value="{{ old('description') }}" placeholder="Deskripsi" />
                                </div>
                                @error('description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <label>Tanggal</label>
                            <div class="form-group">
                                <div class="form-line @error('date') focused error @enderror">
                                    <input type="date" class="form-control" name="date" value="{{ old('date') }}" />
                                </div>
                                @error('date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Total</label>
                                <div class="form-line @error('total') focused error @enderror">
                                    <input type="text" class="form-control" placeholder="Total" name="total"
                                        value="{{ old('total') }}" />
                                </div>
                                @error('total')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect">Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

@endpush