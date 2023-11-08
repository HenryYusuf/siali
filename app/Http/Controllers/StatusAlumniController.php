<?php

namespace App\Http\Controllers;

use App\Models\ReferensiTahun;
use App\Models\StatusAlumni;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatusAlumniController extends Controller
{
    public function statusAlumni(): View
    {
        return view('app.status_alumni.status_alumni');
    }

    public function tidakBekerja(Request $request, $id): RedirectResponse
    {
        $today = Carbon::today();

        $sixMonthsAgo = $today->subMonths(6);

        $prevStatus = StatusAlumni::where(['user_id' => $id])->whereDate('created_at', '>=', $sixMonthsAgo)->first();

        if ($prevStatus) {
            return redirect()->back()->with('error', 'Anda sudah mengisi formulir hari ini.');
        }

        StatusAlumni::create([
            'user_id' => $id,
            'status' => 'Tidak Bekerja',
        ]);

        return redirect()->back();
    }

    public function formLanjutStudy(): View
    {

        $refTahun = ReferensiTahun::orderBy('ref_tahun', 'desc')->get();

        return view('app.status_alumni.form_lanjut_study', ['refTahun' => $refTahun]);
    }

    public function storeLanjutStudy(Request $request, $id): RedirectResponse
    {

        $today = Carbon::today();

        $sixMonthsAgo = $today->subMonths(6);

        $prevStatus = StatusAlumni::where(['user_id' => $id])->whereDate('created_at', '>=', $sixMonthsAgo)->first();

        if ($prevStatus) {
            return redirect()->back()->with('error', 'Anda sudah mengisi formulir hari ini.');
        }

        $request->validate([
            'nama_sekolah' => 'required',
            'jurusan' => 'required',
            'tahun_masuk' => 'required',
            'bukti' => 'required',
        ]);

        $file = $request->file('bukti');
        $path = $file->store('uploads/lanjut_study');

        $cek = StatusAlumni::create([
            'user_id' => $id,
            'status' => 'Lanjut Study',
            'nama_sekolah' => $request->nama_sekolah,
            'jurusan' => $request->jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'bukti' => $path,
        ]);

        return redirect()->back();
    }

    public function formLanjutBekerja(): View
    {
        $refTahun = ReferensiTahun::orderBy('ref_tahun', 'desc')->get();

        return view('app.status_alumni.form_lanjut_bekerja', ['refTahun' => $refTahun]);
    }

    public function storeLanjutBekerja(Request $request, $id): RedirectResponse
    {

        $today = Carbon::today();

        $sixMonthsAgo = $today->subMonths(6);

        $prevStatus = StatusAlumni::where(['user_id' => $id])->whereDate('created_at', '>=', $sixMonthsAgo)->first();

        if ($prevStatus) {
            return redirect()->back()->with('error', 'Anda sudah mengisi formulir hari ini.');
        }

        $request->validate([
            'nama_perusahaan' => 'required',
            'posisi' => 'required',
            'tahun_masuk' => 'required',
            'bukti' => 'required',
        ]);

        $file = $request->file('bukti');
        $path = $file->store('uploads/lanjut_bekerja');

        $cek = StatusAlumni::create([
            'user_id' => $id,
            'status' => 'Bekerja',
            'nama_perusahaan' => $request->nama_perusahaan,
            'posisi' => $request->posisi,
            'tahun_masuk' => $request->tahun_masuk,
            'bukti' => $path,
        ]);

        return redirect()->back();
    }

    public function riwayatLanjutStudy(): View
    {
        $riwayatStudy = StatusAlumni::where('user_id', Auth::id())->where('status', '=', 'Lanjut Study')->paginate(5);

        return view('app.status_alumni.riwayat_lanjut_study', ['riwayatStudy' => $riwayatStudy]);
    }

    public function riwayatBekerja(): View
    {
        $riwayatBekerja = StatusAlumni::where('user_id', Auth::id())->where('status', '=', 'Bekerja')->paginate(5);

        return view('app.status_alumni.riwayat_bekerja', ['riwayatBekerja' => $riwayatBekerja]);
    }
}
