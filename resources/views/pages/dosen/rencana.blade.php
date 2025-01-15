@extends('layouts.app_dosen')

@section('title', 'Rencana')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <h1>Halaman Rencana</h1>
      
        <p>Periode  :</p>
        <p>Status   : -</p>

        <div class="mb-3">
            @if ($rencanaPrilaku && $rencana)
                <form action="{{ route('pengajuanrencana.batalkan', $rencanaPrilaku->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Batalkan Pengajuan</button>
                </form>
            @else
                <form action="{{ route('pengajuanrencana.ajukan') }}" method="POST">
                    @csrf
                    <input type="hidden" name="rencana_prilaku_id" value="{{ $rencanaPrilaku->id ?? '' }}">
                    <input type="hidden" name="rencana_utama_id" value="{{ $rencana->id ?? '' }}">
                    <button class="btn btn-success" id="btnAjukan" type="submit">Ajukan</button>
                </form>
            @endif
        </div>       

        
        <div class="card">
            <div class="card-header">
                <h5>Rencana Kinerja Utama</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="m-3">
                                <th>Bidang</th>
                                <th>Rencana</th>
                                <th>Aksi</th> <!-- Kolom Aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Pengajaran</td>
                                <td>{{ $rencana->pengajaran ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaUtama" data-type="pengajaran" @disabled($rencana->pengajaran ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button> 
                                    @if($rencana)
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaUtama" data-id="{{ $rencana->id }}" data-type="pengajaran" data-value="{{ $rencana->pengajaran }}" @disabled(empty($rencana->pengajaran))>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Penelitian</td>
                                <td>{{ $rencana->penelitian ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaUtama" data-type="penelitian" @disabled($rencana->penelitian ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button> 
                                    @if($rencana)
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaUtama" data-id="{{ $rencana->id }}" data-type="penelitian" data-value="{{ $rencana->penelitian }}" @disabled(empty($rencana->penelitian))>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Pengabdian</td>
                                <td>{{ $rencana->pengabdian ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaUtama" data-type="pengabdian" @disabled($rencana->pengabdian ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button> 
                                    @if($rencana)
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaUtama" data-id="{{ $rencana->id }}" data-type="pengabdian" data-value="{{ $rencana->pengabdian }}" @disabled(empty($rencana->pengabdian))>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>RPS</td>
                                <td>{{ $rencana->rps ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaUtama" data-type="rps" @disabled($rencana->rps ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button>
                                    @if($rencana)
                                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaUtama" data-id="{{ $rencana->id }}" data-type="rps" data-value="{{ $rencana->rps }}" @disabled(empty($rencana->rps))>
                                        <i class="ti ti-edit"></i>
                                    </button>
                                @else
                                    <button class="btn btn-secondary" disabled>
                                        <i class="ti ti-edit"></i>
                                    </button>
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Bimbingan Skripsi</td>
                                <td>{{ $rencana->bimbingan_skripsi ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaUtama" data-type="bimbingan_skripsi" @disabled($rencana->bimbingan_skripsi ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button>
                                    @if($rencana)
                                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaUtama" data-id="{{ $rencana->id }}" data-type="bimbingan_skripsi" data-value="{{ $rencana->bimbingan_skripsi }}" @disabled(empty($rencana->bimbingan_skripsi))>
                                        <i class="ti ti-edit"></i>
                                    </button>
                                @else
                                    <button class="btn btn-secondary" disabled>
                                        <i class="ti ti-edit"></i>
                                    </button>
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Bimbingan KP</td>
                                <td>{{ $rencana->bimbingan_kp ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaUtama" data-type="bimbingan_kp" @disabled($rencana->bimbingan_kp ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button>
                                    @if($rencana)
                                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaUtama" data-id="{{ $rencana->id }}" data-type="bimbingan_kp" data-value="{{ $rencana->bimbingan_kp }}" @disabled(empty($rencana->bimbingan_kp))>
                                        <i class="ti ti-edit"></i>
                                    </button>
                                @else
                                    <button class="btn btn-secondary" disabled>
                                        <i class="ti ti-edit"></i>
                                    </button>
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Bimbingan Dosen Wali</td>
                                <td>{{ $rencana->bimbingan_dosen_wali ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaUtama" data-type="bimbingan_dosen_wali" @disabled($rencana->bimbingan_dosen_wali ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button>
                                    @if($rencana)
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaUtama" data-id="{{ $rencana->id }}" data-type="bimbingan_dosen_wali" data-value="{{ $rencana->bimbingan_dosen_wali }}" @disabled(empty($rencana->bimbingan_dosen_wali))>
                                        <i class="ti ti-edit"></i>
                                    </button>
                                @else
                                    <button class="btn btn-secondary" disabled>
                                        <i class="ti ti-edit"></i>
                                    </button>
                                @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <h5>Rencana Kinerja Utama</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="m-3">
                                <th>Bidang</th>
                                <th>Rencana</th>
                                <th>Aksi</th> <!-- Kolom Aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Pelayanan</td>
                                <td>{{ $rencanaPrilaku->pelayanan ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaPrilaku" data-type="pelayanan" @disabled($rencanaPrilaku->pelayanan ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button> 
                                    @if($rencanaPrilaku)
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaPrilaku" data-id="{{ $rencanaPrilaku->id }}" data-type="pelayanan" data-value="{{ $rencanaPrilaku->pelayanan }}" @disabled(empty($rencanaPrilaku->pelayanan))>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Akuntabel</td>
                                <td>{{ $rencanaPrilaku->akuntable ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaPrilaku" data-type="akuntable" @disabled($rencanaPrilaku->akuntable ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button> 
                                    @if($rencanaPrilaku)
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaPrilaku" data-id="{{ $rencanaPrilaku->id }}" data-type="akuntable" data-value="{{ $rencanaPrilaku->akuntable }}" @disabled(empty($rencanaPrilaku->akuntable))>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Kompeten</td>
                                <td>{{ $rencanaPrilaku->kompeten ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaPrilaku" data-type="kompeten" @disabled($rencanaPrilaku->kompeten ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button> 
                                    @if($rencanaPrilaku)
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaPrilaku" data-id="{{ $rencanaPrilaku->id }}" data-type="kompeten" data-value="{{ $rencanaPrilaku->kompeten }}" @disabled(empty($rencanaPrilaku->kompeten))>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Harmonis</td>
                                <td>{{ $rencanaPrilaku->harmonis ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaPrilaku" data-type="harmonis" @disabled($rencanaPrilaku->harmonis ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button> 
                                    @if($rencanaPrilaku)
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaPrilaku" data-id="{{ $rencanaPrilaku->id }}" data-type="harmonis" data-value="{{ $rencanaPrilaku->harmonis }}" @disabled(empty($rencanaPrilaku->harmonis))>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Loyal</td>
                                <td>{{ $rencanaPrilaku->loyal ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaPrilaku" data-type="loyal" @disabled($rencanaPrilaku->loyal ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button> 
                                    @if($rencanaPrilaku)
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaPrilaku" data-id="{{ $rencanaPrilaku->id }}" data-type="loyal" data-value="{{ $rencanaPrilaku->loyal }}" @disabled(empty($rencanaPrilaku->loyal))>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Adaptif</td>
                                <td>{{ $rencanaPrilaku->adaptif ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaPrilaku" data-type="adaptif" @disabled($rencanaPrilaku->adaptif ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button> 
                                    @if($rencanaPrilaku)
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaPrilaku" data-id="{{ $rencanaPrilaku->id }}" data-type="adaptif" data-value="{{ $rencanaPrilaku->adaptif }}" @disabled(empty($rencanaPrilaku->adaptif))>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Kolaboratif</td>
                                <td>{{ $rencanaPrilaku->kolaboratif ?? 'Belum diisi' }}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModalRencanaPrilaku" data-type="kolaboratif" @disabled($rencanaPrilaku->kolaboratif ?? false)>
                                        <i class="ti ti-plus"></i>
                                    </button> 
                                    @if($rencanaPrilaku)
                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModalRencanaPrilaku" data-id="{{ $rencanaPrilaku->id }}" data-type="kolaboratif" data-value="{{ $rencanaPrilaku->kolaboratif }}" @disabled(empty($rencanaPrilaku->kolaboratif))>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
           
      

    <!-- Modal Tambah Rencana Utama -->
    <div class="modal fade" id="tambahModalRencanaUtama" tabindex="-1" aria-labelledby="tambahModalRencanaUtamaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('rencana_utama.store') }}" method="POST"> <!-- Rute untuk Rencana Utama -->
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalRencanaUtamaLabel">Tambah Rencana Utama</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kolom1" class="form-label">Kolom 1</label>
                            <input type="text" name="kolom1" class="form-control" id="kolom1" required>
                        </div>
                        <!-- Tambahkan input lain sesuai kebutuhan untuk Rencana Utama -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Rencana Prilaku -->
    <div class="modal fade" id="tambahModalRencanaPrilaku" tabindex="-1" aria-labelledby="tambahModalRencanaPrilakuLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('rencana_prilaku.store') }}" method="POST"> <!-- Rute untuk Rencana Prilaku -->
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalRencanaPrilakuLabel">Tambah Rencana Prilaku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kolom1" class="form-label">Kolom 1</label>
                            <input type="text" name="kolom1" class="form-control" id="kolom1" required>
                        </div>
                        <!-- Tambahkan input lain sesuai kebutuhan untuk Rencana Prilaku -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit Rencana Utama --}}
    <div class="modal fade" id="editModalRencanaUtama" tabindex="-1" aria-labelledby="editModalRencanaUtamaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editFormRencanaUtama" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalRencanaUtamaLabel">Edit Rencana Utama</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editInputRencanaUtama" class="form-label">Kolom</label>
                            <input type="text" name="kolom" class="form-control" id="editInputRencanaUtama" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit Rencana Prilaku --}}
    <div class="modal fade" id="editModalRencanaPrilaku" tabindex="-1" aria-labelledby="editModalRencanaPrilakuLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editFormRencanaPrilaku" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalRencanaPrilakuLabel">Edit Rencana Prilaku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editInputRencanaPrilaku" class="form-label">Kolom</label>
                            <input type="text" name="kolom" class="form-control" id="editInputRencanaPrilaku" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Script untuk modal tambah Rencana Utama
        document.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById('tambahModalRencanaUtama');
            modal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var type = button.getAttribute('data-type');
                var modalTitle = modal.querySelector('.modal-title');
                var inputLabel = modal.querySelector('.form-label');
                var inputField = modal.querySelector('input[name="kolom1"]');

                var formattedType = type.replace(/_/g, ' ').replace(/\b\w/g, function (l) { return l.toUpperCase(); });

                modalTitle.textContent = 'Tambah ' + formattedType;
                inputLabel.textContent = formattedType;
                inputField.setAttribute('name', type);
            });
        });

        // Script untuk modal tambah Rencana Prilaku
        document.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById('tambahModalRencanaPrilaku');
            modal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var type = button.getAttribute('data-type');
                var modalTitle = modal.querySelector('.modal-title');
                var inputLabel = modal.querySelector('.form-label');
                var inputField = modal.querySelector('input[name="kolom1"]');

                var formattedType = type.replace(/_/g, ' ').replace(/\b\w/g, function (l) { return l.toUpperCase(); });

                modalTitle.textContent = 'Tambah ' + formattedType;
                inputLabel.textContent = formattedType;
                inputField.setAttribute('name', type);
            });
        });

        // Script untuk modal edit Rencana Utama
        document.addEventListener('DOMContentLoaded', function () {
            var editModal = document.getElementById('editModalRencanaUtama');
            editModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var type = button.getAttribute('data-type');
                var value = button.getAttribute('data-value');
                var modalTitle = editModal.querySelector('.modal-title');
                var inputField = editModal.querySelector('input[name="kolom"]');
                var form = document.getElementById('editFormRencanaUtama');

                modalTitle.textContent = 'Edit ' + type.replace(/_/g, ' ').replace(/\b\w/g, function (l) { return l.toUpperCase(); });
                inputField.value = value;
                form.action = '/rencana_utama/' + id; // Rute untuk Rencana Utama
            });
        });

        // Script untuk modal edit Rencana Prilaku
        document.addEventListener('DOMContentLoaded', function () {
            var editModal = document.getElementById('editModalRencanaPrilaku');
            editModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var type = button.getAttribute('data-type');
                var value = button.getAttribute('data-value');
                var modalTitle = editModal.querySelector('.modal-title');
                var inputField = editModal.querySelector('input[name="kolom"]');
                var form = document.getElementById('editFormRencanaPrilaku');

                modalTitle.textContent = 'Edit ' + type.replace(/_/g, ' ').replace(/\b\w/g, function (l) { return l.toUpperCase(); });
                inputField.value = value;
                form.action = '/rencana_prilaku/' + id; // Rute untuk Rencana Prilaku
            });
        });
    </script>

    
@endsection