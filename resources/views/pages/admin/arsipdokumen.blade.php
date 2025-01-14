@extends('layouts.app_admin')

@section('content')
<div class="container">
    <h1>Arsip Dokumen</h1>
    <a href="{{ route('periode.create') }}" class="btn btn-success mb-3">Tambah Periode</a>
    <br>
    <br>
    <div class="row">
        @foreach($periods as $period)
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Tahun {{ \Carbon\Carbon::parse($period->tanggal_mulai)->format('Y') }}</p>
                    <p class="">{{ \Carbon\Carbon::parse($period->tanggal_mulai)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($period->tanggal_selesai)->translatedFormat('d F Y') }}</p>
                    <a href="" class="btn btn-primary">Lihat Dokumen</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection