@extends('layouts.app_dosen')

@section('title', 'Realisasi SKP')

@section('content')
    <div class="row">
        <h1>Halaman Realisasi SKP</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pengajaran</th>
                    <th>Penelitian</th>
                    <th>Pengabdian</th>
                    <th>RPS</th>
                    <th>Bimbingan Skripsi</th>
                    <th>Bimbingan KP</th>
                    <th>Bimbingan Dosen Wali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($realisasi as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->pengajaran }}</td>
                        <td>{{ $item->penelitian }}</td>
                        <td>{{ $item->pengabdian }}</td>
                        <td>{{ $item->rps }}</td>
                        <td>{{ $item->bimbingan_skripsi }}</td>
                        <td>{{ $item->bimbingan_kp }}</td>
                        <td>{{ $item->bimbingan_dosen_wali }}</td>
                        <td>
                            <a href="{{ route('rencana_utama.update', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('rencana_utama.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection