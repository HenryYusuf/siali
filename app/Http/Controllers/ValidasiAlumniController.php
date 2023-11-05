<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ValidasiAlumniController extends Controller
{
    public function validasiAlumni(): View
    {
        if (Auth::user()->roles->first()->nama_role != 'Administrator') {
            return view('errors.404');
        }

        $users = User::with(['roles', 'profil'])->whereHas('roles', function ($query) {
            $query->where('nama_role', 'Alumni');
        })->get();

        // dd($users);

        return view('app.admin.manajemen_alumni.validasi_alumni', ['users' => $users]);
    }

    public function approveValidasiAlumni($id): RedirectResponse
    {
        if (Auth::user()->roles->first()->nama_role != 'Administrator') {
            return redirect('/404');
        }

        Profil::where('user_id', $id)->update(['is_validate' => 1, 'deskripsi_is_validate' => 'Update Profile Accepted']);

        return redirect()->intended('validasi-alumni');
    }

    public function viewValidasiAlumni($id): View
    {
        if (Auth::user()->roles->first()->nama_role != 'Administrator') {
            return view('errors.404');
        }

        $user = User::where('id', $id)->first();

        return view('app.admin.manajemen_alumni.view_validasi_alumni', ['user' => $user]);
    }

    public function storeKomenValidasiAlumni(Request $request, $id): RedirectResponse
    {
        if (Auth::user()->roles->first()->nama_role != 'Administrator') {
            return redirect('/404');
        }

        $request->validate([
            'deskripsi_is_validate' => 'required'
        ]);

        Profil::where('user_id', $id)->update([
            'deskripsi_is_validate' => $request->deskripsi_is_validate
        ]);

        return redirect()->intended('validasi-alumni');
    }
}
