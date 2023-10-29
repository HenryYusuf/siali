<?php

namespace App\Http\Controllers;

use App\Models\ReferensiTahun;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReferensiTahunController extends Controller
{
    public function referensiTahun() : View {

        $refTahun = ReferensiTahun::orderBy('ref_tahun', 'desc')->get();

        return view('app.admin.referensi.referensi_tahun', ['refTahun' => $refTahun]);
    }

    public function addReferensiTahun() : View {
        return view('app.admin.referensi.add_referensi_tahun');
    }

    public function storeReferensiTahun(Request $request) : RedirectResponse {
        // dd($request->all());
        $request->validate([
            'ref_tahun' => ['required', 'numeric', 'unique:referensi_tahun,ref_tahun']
        ]);

        ReferensiTahun::create([
            'ref_tahun' => $request->ref_tahun
        ]);

        return redirect()->intended('referensi-tahun');
    }

    public function deleteReferensiTahun($id) : RedirectResponse {
        ReferensiTahun::where('id', $id)->delete();

        return redirect()->intended('referensi-tahun');
    }
}
