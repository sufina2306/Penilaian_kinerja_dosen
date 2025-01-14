@extends('layouts.app_dosen')

@section('title', 'Profil')

@section('content')
    <div class="row">

        <h1>Halaman Profil</h1>
        @foreach($profil as $profils)
        @endforeach


    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">    
                <div class="card">
                  <img src="{{ $profils->gambar ? asset('storage/asset/images/profil/' . $profils->gambar) : asset('assets/images/profile/default.jpg') }}" class="card-img-top" alt="...">
                 <br>

                 @if($profils) 
                        <a href="{{ route('profil.edit', $profils->id) }}" class="btn btn-primary">Edit Profil</a>
                    @else
                        <p>Profil tidak ditemukan.</p>
                    @endif
                    
           
                </div>
              </div>
             
              <div class="col-md-9">
                <div class="row ">
                    <h5 class="card-title"> {{ $profils->name }}</h5>
                    <br><br>
                    <div class="col-md-4 m-3">
                        <h6 class="card-subtitle mb-2 ">Email</h6>
                        <p class="card-text"> {{ $profils->email }} </p>
                        <h6 class="card-subtitle mb-2 ">NIP</h6>
                        <p class="card-text"> {!! $profils->nip ?: '<span class="text-danger">Harap isi NIP.</span>' !!} </p>
                        <h6 class="card-subtitle mb-2 ">Pangkat</h6>
                        <p class="card-text"> {!! $profils->pangkat ?: '<span class="text-danger">Harap isi Pangkat.</span>' !!} </p>
                    </div>
                    <div class="col-md-6 m-3">
                        <h6 class="card-subtitle mb-2 ">Jabatan</h6>
                        <p class="card-text"> {!! $profils->jabatan ?: '<span class="text-danger">Harap isi Jabatan.</span>' !!} </p>
                        <h6 class="card-subtitle mb-2">Unit Kerja</h6>
                        <p class="card-text"> {!! $profils->unitkerja ?: '<span class="text-danger">Harap isi Unit Kerja.</span>' !!} </p>
                        <h6 class="card-subtitle mb-2">Prodi</h6>
                        <p class="card-text"> {!! $profils->prodi ?: '<span class="text-danger">Harap isi Prodi.</span>' !!} </p> 
                    </div>
                </div>
                    <br>
                    
                  </div>
                  <hr>

                  
                </div>
              </div>
            </div>
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