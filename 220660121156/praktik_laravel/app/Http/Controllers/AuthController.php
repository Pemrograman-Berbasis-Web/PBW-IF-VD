<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function auth()
    {
        return view('auth');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'password wajib diisi',
            'password.min' => 'password minimal 6 karakter',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            //smtp


            return redirect()->route('auth')->with('success', 'Berhasil Mendaftar! silahkan cek email anda!');
        } catch (\Exception $e) {
            return redirect()->route('auth')->with('error', 'Gagal Mendaftar!' . $e);
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);


        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->email_verified_at) {
                $request->session()->regenerate();
                if (Auth::user()->role === 'admin') {
                    return redirect()->route('admin')->with('success', 'selamat datang admin!');
                } else {
                    return redirect()->route('user')->with('success', 'anda berhasil masuk!');
                }
            } else {
                Auth::logout();
                return back(401)->with('error', 'harap verifikasi kembali!');
            }
        }
        return redirect()->route('auth')->with('error', 'kombinasi email dan password salah!');
    }
}
