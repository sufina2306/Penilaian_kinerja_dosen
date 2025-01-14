<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckLevel; // Pastikan ini sesuai dengan lokasi kelas CheckLevel
use Illuminate\Support\Facades\Log; 
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

      if (Auth::attempt($request->only('email', 'password'))) {
    $user = Auth::user();
    if (!$user) {
        return back()->with('failed', 'Autentikasi gagal, pengguna tidak ditemukan.');
    }
    if ($user->level == 'admin') {
        return redirect('/pages/admin/dashboard');
    } elseif ($user->level == 'atasan') {
        return redirect('/pages/atasan/dashboard');
    } elseif ($user->level == 'dosen') {
        return redirect('/pages/dosen/dashboard');
    }
}
        // Autentikasi gagal
        return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
