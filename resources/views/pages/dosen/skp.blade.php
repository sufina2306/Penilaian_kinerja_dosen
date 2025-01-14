@extends('layouts.app_dosen')

@section('title', 'Dashboard')

@section('content')
    <div class="row">

        <h1>Daftar SKP</h1>
        <h5>Daftar Sasaran Kinerja Pegawai</h5>

    

        <div class="dropdown m-3">
           
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Pilih Periode
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="periodList">
                @foreach($filteredPeriods as $period)
                    <li>
                        <a class="dropdown-item" href="{{ route('pages.dosen.skp', $period->id) }}">
                            {{ \Carbon\Carbon::parse($period->tanggal_mulai)->translatedFormat('Y') }} - {{ \Carbon\Carbon::parse($period->tanggal_selesai)->translatedFormat('Y') }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

       
        <div class="card m-3" style=" ">
            <div class="card-body"> 
                <div class="row">
                    @foreach($periods as $period)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Tahun {{ \Carbon\Carbon::parse($period->tanggal_mulai)->format('Y') }}</p>
                                <p class="">{{ \Carbon\Carbon::parse($period->tanggal_mulai)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($period->tanggal_selesai)->translatedFormat('d F Y') }}</p>
                                <a href="" class="btn btn-primary m-2">Rencana SKP  </a>
                                <a href="" class="btn btn-primary m-2">Realisasi</a>
                                <a href="" class="btn btn-primary m-2">Dokumen SKP</a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
          
        
    </div>
@endsection