<?php

namespace App\Http\Controllers;

use App\Models\ReferensiTahun;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReferensiTahunController extends Controller
{
    public function referensiTahun(): View
    {

        if (Auth::user()->roles->first()->nama_role != 'Administrator') {
            return view('errors.not_found');
        }

        $refTahun = ReferensiTahun::orderBy('ref_tahun', 'desc')->get();

        return view('app.admin.referensi.referensi_tahun', ['refTahun' => $refTahun]);
    }

    public function addReferensiTahun(): View
    {
        if (Auth::user()->roles->first()->nama_role != 'Administrator') {
            return view('errors.not_found');
        }

        return view('app.admin.referensi.add_referensi_tahun');
    }

    public function storeReferensiTahun(Request $request): RedirectResponse
    {
        if (Auth::user()->roles->first()->nama_role != 'Administrator') {
            return redirect('/not-found');
        }

        $request->validate([
            'ref_tahun' => ['required', 'numeric', 'unique:referensi_tahun,ref_tahun']
        ]);

        ReferensiTahun::create([
            'ref_tahun' => $request->ref_tahun
        ]);

        return redirect()->intended('referensi-tahun');
    }

    public function deleteReferensiTahun($id): RedirectResponse
    {
        if (Auth::user()->roles->first()->nama_role != 'Administrator') {
            return redirect('/not-found');
        }

        ReferensiTahun::where('id', $id)->delete();

        return redirect()->intended('referensi-tahun');
    }
}
