<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profil;
use App\Models\Periode;

class DosenController extends Controller
{
    public function dashboard()
    {
        return view('pages.dosen.dashboard'); // Ganti dengan tampilan yang sesuai
    }
    public function skp(Request $request)
    {
        $periods = Periode::all(); // Ambil semua periode
        // Filter berdasarkan periode jika ada
        $filteredPeriods = $request->has('period') ? Periode::where('id', $request->period)->get() : $periods;

        return view('pages.dosen.skp', compact('periods', 'filteredPeriods')); // Mengembalikan tampilan SKP dengan periode
    }
    public function profil()
    {
        
        $profil = User::where('level', 'dosen')->get(); // Ambil dosen dengan level 'dosen' return view('pages.admin.daftarDosen', compact('dosen')); // Return the settings view
        return view('pages.dosen.profil', compact('profil'));
    }

    public function edit($id) {
        $profil = User::findOrFail($id);
        return view('pages.dosen.editprofil', compact('profil'));
    }

    public function update(Request $request, $id) {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'nip' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'unitkerja' => 'required',
            'prodi' => 'required',
            'image' => 'nullable|image|max:2048', // Validasi gambar
        ]);

        $profil = User::findOrFail($id);
        
        // Update data profil
        $profil->email = $request->email;
        $profil->nip = $request->nip;
        $profil->pangkat = $request->pangkat;
        $profil->jabatan = $request->jabatan;
        $profil->unitkerja = $request->unitkerja;
        $profil->prodi = $request->prodi;

        // Cek jika ada gambar yang diupload
        if ($request->hasFile('image')) {
            // Simpan gambar dan ambil nama file
            $filename = $request->file('image')->store('asset/images/profil', 'public');
            $profil->gambar = basename($filename); // Simpan hanya nama file
        }

        $profil->save();

        return redirect()->route('pages.dosen.profil')->with('success', 'Profil berhasil diperbarui.');
    }
} 