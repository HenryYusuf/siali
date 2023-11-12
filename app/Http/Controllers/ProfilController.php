<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\ReferensiTahun;
use App\Models\User;
use File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfilController extends Controller
{
    public function profil($id): View
    {
        $user = User::find($id);
        $profil = Profil::where('user_id', $id)->first();

        $refTahun = ReferensiTahun::orderBy('ref_tahun', 'desc')->get();

        return view('app.profil.profil', ['user' => $user, 'profil' => $profil, 'refTahun' => $refTahun]);
    }

    public function storeUpdateProfil(Request $request, $id): RedirectResponse
    {
        // dd($request->all());

        $userIdProfil = Profil::where('user_id', $id)->first();

        $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'no_ijazah' => 'required',
            'no_hp' => 'required',
            'tahun_lulus' => 'required',
        ]);

        if (!$userIdProfil) {
            User::where('id', $id)->update(['nama' => $request->nama]);
            Profil::create([
                'user_id' => $id,
                'nisn' => $request->nisn,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'alamat' => $request->alamat,
                'no_ijazah' => $request->no_ijazah,
                'no_hp' => $request->no_hp,
                'tahun_lulus' => $request->tahun_lulus,
                'is_validate' => 0,
                'deskripsi_is_validate' => 'Dalam Verifikasi',
            ]);
        } else {
            User::where('id', $id)->update(['nama' => $request->nama]);
            Profil::where('user_id', $id)->update([
                'user_id' => $id,
                'nisn' => $request->nisn,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'alamat' => $request->alamat,
                'no_ijazah' => $request->no_ijazah,
                'no_hp' => $request->no_hp,
                'tahun_lulus' => $request->tahun_lulus,
                'is_validate' => 0,
                'deskripsi_is_validate' => 'Dalam Verifikasi',
            ]);
        }

        return redirect()->back()->with('success', 'Profile update has been successful!');
    }

    public function updateFotoProfil($id): View
    {
        $profil = Profil::where('user_id', $id)->first();

        return view('app.profil.foto_profil', ['profil' => $profil]);
    }

    public function addFotoProfil(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'foto_profil' => 'required|max:2048'
        ]);

        $originName = $request->file('foto_profil')->getClientOriginalName();
        $fileName = pathInfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('foto_profil')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;
        $request->file('foto_profil')->move(public_path('uploads/foto_profil'), $fileName);

        Profil::where('user_id', $id)->update([
            'foto_profil' => $fileName,
        ]);

        return redirect()->back()->with('success', 'Foto profile update has been successful!');
    }
}
