<?php

namespace App\Http\Controllers;

use App\Models\ReferensiTahun;
use App\Models\StatusAlumni;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatusAlumniController extends Controller
{
    public function statusAlumni(): mixed
    {
        if (Auth::user()->roles->first()->nama_role == 'Administrator') {
            return view('app.status_alumni.status_alumni');
        }

        $statusUser = User::with('profil')->whereHas('profil', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->first();

        if (empty($statusUser)) {
            return redirect('/dashboard')->withErrors('Please fill in your profile first');
        }

        return view('app.status_alumni.status_alumni');
    }

    public function tidakBekerja(Request $request, $id): RedirectResponse
    {
        $today = Carbon::today();

        $sixMonthsAgo = $today->subMonths(6);

        $prevStatus = StatusAlumni::where(['user_id' => $id])->whereDate('created_at', '>=', $sixMonthsAgo)->first();

        if ($prevStatus) {
            return redirect()->back()->with('error', 'Please fill in the alumni status in 6 months.');
        }

        StatusAlumni::create([
            'user_id' => $id,
            'status' => 'Tidak Bekerja',
        ]);

        return redirect()->back()->with('success', 'Thank you for filling in the alumni status!');
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
            return redirect()->back()->with('error', 'Please fill in the alumni status in 6 months.');
        }

        $request->validate([
            'nama_sekolah' => 'required',
            'jurusan' => 'required',
            'tahun_masuk' => 'required',
            'bukti' => 'required',
        ]);

        $originName = $request->file('bukti')->getClientOriginalName();
        $fileName = pathInfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('bukti')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;
        $request->file('bukti')->move(public_path('uploads/lanjut_study'), $fileName);

        StatusAlumni::create([
            'user_id' => $id,
            'status' => 'Lanjut Study',
            'nama_sekolah' => $request->nama_sekolah,
            'jurusan' => $request->jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'bukti' => $fileName,
        ]);

        return redirect()->back()->with('success', 'Thank you for filling in the alumni status!');
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
            return redirect()->back()->with('error', 'Please fill in the alumni status in 6 months.');
        }

        $request->validate([
            'nama_perusahaan' => 'required',
            'posisi' => 'required',
            'tahun_masuk' => 'required',
            'bukti' => 'required',
        ]);

        $originName = $request->file('bukti')->getClientOriginalName();
        $fileName = pathInfo($originName, PATHINFO_FILENAME);
        $extension = $request->file('bukti')->getClientOriginalExtension();
        $fileName = $fileName . '_' . time() . '.' . $extension;
        $request->file('bukti')->move(public_path('uploads/lanjut_bekerja'), $fileName);

        StatusAlumni::create([
            'user_id' => $id,
            'status' => 'Bekerja',
            'nama_perusahaan' => $request->nama_perusahaan,
            'posisi' => $request->posisi,
            'tahun_masuk' => $request->tahun_masuk,
            'bukti' => $fileName,
        ]);

        return redirect()->back()->with('success', 'Thank you for filling in the alumni status!');
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
