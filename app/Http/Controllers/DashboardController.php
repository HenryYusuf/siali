<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $countAlumni = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('nama_role', 'Alumni');
        })->count();

        $countLowongan = Lowongan::count();

        $countTestimoni = Testimoni::count();

        $isInputTestimoni = User::with('testimoni')->whereHas('testimoni', function ($query) {
            $query->where('user_id', Auth::id());
        })->first();

        return view('app.dashboard', ['countAlumni' => $countAlumni, 'countLowongan' => $countLowongan, 'countTestimoni' => $countTestimoni, 'isInputTestimoni' => $isInputTestimoni]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'deskripsi' => 'required'
        ]);

        Testimoni::create([
            'user_id' => Auth::id(),
            'deskripsi' => $request->deskripsi,
        ]);

        return back();
    }
}
