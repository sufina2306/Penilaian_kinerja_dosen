@extends('layouts.app_dosen')

@section('title', 'Edit Profil')

@section('content')
    <div class="row">
        <h1>Edit Profil</h1>

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    @if($profil)
                        <form action="{{ route('profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-3">    
                                    <div class="card">
                                      <img src="{{ $profil->gambar ? asset('storage/asset/images/profil/' . $profil->gambar) : asset('assets/images/profile/default.jpg') }}" class="card-img-top" alt="...">
                                        <br>
                                        <input type="file" name="image" class="form-control mb-2 "> 
                                    </div>
                                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                    <button type="button" class="btn btn-secondary" onclick="window.history.back();">Batal</button>
                                </div>
                                <div class="col-md-9">
                                    <div class="row ">
                                        <h5 class="card-title"> {{ $profil->name }}</h5>
                                        <br><br>
                                        <div class="col-md-4 m-3">
                                            <h6 class="card-subtitle mb-2 ">Email</h6>
                                            <input type="email" name="email" class="form-control mb-2 " value="{{ $profil->email }}">
                                            <h6 class="card-subtitle mb-2 ">NIP</h6>
                                            <input type="text" name="nip" class="form-control mb-2 " value="{{ $profil->nip }}">
                                            @error('nip')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <h6 class="card-subtitle mb-2 ">Pangkat</h6>
                                            <input type="text" name="pangkat" class="form-control mb-2 " value="{{ $profil->pangkat }}">
                                            @error('pangkat')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 m-3">
                                            <h6 class="card-subtitle mb-2 ">Jabatan</h6>
                                            <input type="text" name="jabatan" class="form-control mb-2 " value="{{ $profil->jabatan }}">
                                            @error('jabatan')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <h6 class="card-subtitle mb-2">Unit Kerja</h6>
                                            <input type="text" name="unitkerja" class="form-control mb-2 " value="{{ $profil->unitkerja }}">
                                            @error('unitkerja')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <h6 class="card-subtitle mb-2">Prodi</h6>
                                            <input type="text" name="prodi" class="form-control mb-2 " value="{{ $profil->prodi }}"> 
                                            @error('prodi')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    
                                </div>
                            </div>
                        </form>
                    @else
                        <p>Profil tidak ditemukan.</p>
                    @endif
                </div>
            </div>
            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
                    class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com/" target="_blank"
                    class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
            </div>
        </div>
    </div>
@endsection