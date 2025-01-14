<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Periode;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('pages.admin.dashboard'); // Return the dashboard view
    }
    public function daftarDosen()
    {
        $dosen = User::where('level', 'dosen')->get(); // Ambil dosen dengan level 'dosen'
        return view('pages.admin.daftarDosen', compact('dosen')); // Return the settings view
    }
    public function arsipDokumen()
    {
        $periods = Periode::all(); // Ambil semua periode
        return view('pages.admin.arsipdokumen', compact('periods')); // Mengembalikan tampilan arsip dokumen dengan periode
    }
    public function tambahPeriode()
    {
        $successMessage = session('success'); // Ambil pesan sukses dari session
        return view('pages.admin.tambahperiode', compact('successMessage')); // Mengembalikan tampilan tambah periode dengan pesan
    }
    public function storePeriode(Request $request)
    {
        // Validasi dan simpan data periode
        $request->validate([
            'nama_periode' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        try {
            // Simpan data ke database (misalnya ke model Periode)
            Periode::create($request->all());

            // Redirect ke halaman tambah periode dengan pesan sukses
            return redirect()->route('periode.create')->with('success', 'Periode berhasil ditambahkan!'); // Redirect setelah menyimpan
        } catch (\Exception $e) {
            // Redirect kembali dengan pesan error jika terjadi kesalahan
            return redirect()->back()->withErrors(['error' => 'Gagal menambahkan periode. Silakan coba lagi.'])->withInput();
        }
    }
}
