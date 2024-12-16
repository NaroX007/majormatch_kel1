<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:akun|max:255',
            'email' => 'required|email|unique:akun',
            'password' => 'required|min:6',
        ]);

        Akun::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('login')->with('success', 'Registration successful!');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $akun = Akun::where('email', $request->email)->first();

    if ($akun && Hash::check($request->password, $akun->password)) {
        Auth::loginUsingId($akun->id);
        
        // Menyimpan informasi akun ke dalam session
        $request->session()->put('akun', $akun);

        return redirect('/'); // Redirect ke halaman index setelah login berhasil
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}

}



