@extends('layouts.app_admin')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Halaman Dosen</h5>
                <p class="mb-0">This is a sample page </p>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                    <th>NIP</th>
                    <th>Pangkat</th>
                    <th>Jabatan</th>
                    <th>Unit Kerja</th>
                    <th>Prodi</th>
                    <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dosen as $dosens)
                            <tr> 
                                <td>{{ $dosens->name }}</td>
                                <td>{{ $dosens->email }}</td>
                                <td>{{ $dosens->nip }}</td>
                                <td>{{ $dosens->pangkat }}</td>
                                <td>{{ $dosens->jabatan }}</td>
                                <td>{{ $dosens->unitkerja }}</td>
                                <td>{{ $dosens->prodi }}</td>
                                <td>{{ $dosens->level }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
            
          </div>
    </div>
@endsection