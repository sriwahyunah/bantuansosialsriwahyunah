<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN LOGIN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        /*
        |--------------------------------------------------------------------------
        | LOGIN USER
        |--------------------------------------------------------------------------
        */

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            /*
            |--------------------------------------------------------------------------
            | REDIRECT BERDASARKAN ROLE
            |--------------------------------------------------------------------------
            */

            if ($user->role == 'admin') {

                return redirect()->route('admin.dashboard');
            }

            if ($user->role == 'petugas') {

                return redirect()->route('petugas.dashboard');
            }

            if ($user->role == 'masyarakat') {

                return redirect()->route('masyarakat.dashboard');
            }
        }

        return back()->with('error', 'Username atau Password salah');
    }
}
