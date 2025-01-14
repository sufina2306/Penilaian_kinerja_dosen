<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginRegisterController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function homeuser()
    {
        return view('user.homeuser');
    }

    public function homeadmin()
    {
        return view('admin.homeadmin');
    }

       public function postRegister(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'umur' => 'required',
        'jeniskelamin' => 'required',
        'alamat' => 'required',
        'password' => 'required|min:8|max:20|confirmed',
    ]);

    try {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->umur = $request->umur;
        $user->jeniskelamin = $request->jeniskelamin;
        $user->alamat = $request->alamat;
        $user->password = Hash::make($request->password);
        $user->level = 'user'; // Atau 'admin' sesuai dengan kebutuhan
        $user->save();

        return redirect()->route('auth.login')->with('success', 'Akun berhasil dibuat, silahkan melakukan proses login!');
    } catch (\Exception $e) {
        return back()->with('failed', 'Maaf, terjadi kesalahan saat menyimpan data pengguna. Silakan coba lagi.');
    }
}

public function postLogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8|max:20',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();
        if ($user->level == 'user') {
            return redirect()->route('user.homeuser');
        } elseif ($user->level == 'admin') {
            return redirect()->route('admin.homeadmin');
        }
    }

    return back()->with('failed', 'Maaf, email atau password yang Anda masukkan salah.');
}
public function logout()
{
    Auth::logout();
    return redirect('/');
}

}