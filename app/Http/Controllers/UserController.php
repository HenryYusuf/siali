<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function login() : View {
        return view('auth.login');
    }

    public function storeLogin(Request $request): RedirectResponse
    {
        // dd($request->all());

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Email yang dimasukkan salah', 'password' => 'Password yang dimasukkan salah'])->onlyInput('email', 'password');
    }

    public function register() : View {
        return view('auth.register');
    }

    public function storeRegister(Request $request): RedirectResponse
    {
        // dd($request->all());

        $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // dd($user->id);

        UserRole::create([
            'user_id' => $user->id,
            'role_id' => 2,
        ]);

        // dd('berhasil');

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Silahkan gunakan email lain'])->onlyInput('email');
    }

    public function logout() : RedirectResponse {
        Auth::logout();
        return redirect()->intended('login');
    }
}
