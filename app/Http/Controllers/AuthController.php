<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function halaman_daftar()
    {
        return view('auth.halaman_daftar');
    }

    public function halaman_login()
    {
        return view('auth.halaman_login');
    }

    public function register(Request $request)
    {
        $request->validate([
        'username' => 'required',
        'password' => 'required',
        'email' => 'required',
        'nama_lengkap' => 'required',
        ]);


        $user = new User;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->level = 'peminjam';
        $user->save();

        return redirect()->back();
    }

    public function login(Request $request)
    {
        $hanya = $request->only('email', 'password');
    
        if (Auth::attempt($hanya)) {
            $user = Auth::user();
            if ($user->level == 'peminjam') {
                // Redirect user to specific page
                return redirect()->route('user.home');
            } elseif ($user->level == 'admin') {
                // Redirect admin to specific page
                return redirect()->route('datauser.index');
            }else if ($user->level == 'petugas'){
                return redirect()->route('petugas.databuku');
            }
        }
    }
}
