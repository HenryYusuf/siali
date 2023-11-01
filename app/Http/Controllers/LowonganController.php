<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LowonganController extends Controller
{
    public function lowongan(): View
    {
        $getLowongan = Lowongan::all();

        return view('app.admin.lowongan.lowongan', ['getLowongan' => $getLowongan]);
    }

    public function addLowongan(): View
    {
        return view('app.admin.lowongan.add_lowongan');
    }

    public function storeLowongan(Request $request): RedirectResponse
    {
        // dd($request->all());

        $request->validate([
            'nama_lowongan' => 'required',
            'nama_perusahaan' => 'required',
            'lokasi' => 'required',
            'foto_brosur' => 'required',
            'posisi' => 'required',
            'gaji' => 'required',
            'email' => 'required',
            'deskripsi' => 'required',
        ]);

        $file = $request->file('foto_brosur');

        $path = $file->store('uploads/foto_brosur');

        Lowongan::create([
            'user_id' => Auth::user()->id,
            'nama_lowongan' => $request->nama_lowongan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'lokasi' => $request->lokasi,
            'foto_brosur' => $path,
            'posisi' => $request->posisi,
            'gaji' => $request->gaji,
            'email' => $request->email,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->intended('lowongan');

    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('uploads/ckeditor'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/ckeditor/' . $fileName);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function editLowongan($id): View
    {

        $lowongan = Lowongan::with('user')->where('id', $id)->first();

        // dd($lowongan);

        return view('app.admin.lowongan.edit_lowongan', ['lowongan' => $lowongan]);
    }

    public function updateLowongan(Request $request, $id): RedirectResponse
    {
        // dd($request->all());

        if ($request->hasFile('foto_brosur')) {
            // dd('Ini ada file');

            $request->validate([
                'nama_lowongan' => 'required',
                'nama_perusahaan' => 'required',
                'lokasi' => 'required',
                'foto_brosur' => 'required',
                'posisi' => 'required',
                'gaji' => 'required',
                'email' => 'required',
                'deskripsi' => 'required',
            ]);

            $file = $request->file('foto_brosur');

            $path = $file->store('uploads/foto_brosur');

            Lowongan::where('id', $id)->update([
                // 'user_id' => Auth::user()->id,
                'nama_lowongan' => $request->nama_lowongan,
                'nama_perusahaan' => $request->nama_perusahaan,
                'lokasi' => $request->lokasi,
                'foto_brosur' => $path,
                'posisi' => $request->posisi,
                'gaji' => $request->gaji,
                'email' => $request->email,
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect()->intended('lowongan');

        } else {
            $request->validate([
                'nama_lowongan' => 'required',
                'nama_perusahaan' => 'required',
                'lokasi' => 'required',
                'foto_brosur' => 'required',
                'posisi' => 'required',
                'gaji' => 'required',
                'email' => 'required',
                'deskripsi' => 'required',
            ]);

            Lowongan::where('id', $id)->update([
                // 'user_id' => Auth::user()->id,
                'nama_lowongan' => $request->nama_lowongan,
                'nama_perusahaan' => $request->nama_perusahaan,
                'lokasi' => $request->lokasi,
                'foto_brosur' => $request->foto_brosur,
                'posisi' => $request->posisi,
                'gaji' => $request->gaji,
                'email' => $request->email,
                'deskripsi' => $request->deskripsi,
            ]);

            return redirect()->intended('lowongan');
        }

    }

    public function deleteLowongan($id) : RedirectResponse {
        Lowongan::where('id', $id)->delete();

        return redirect()->intended('lowongan');
    }

    public function viewLowongan($id) : View {

        $viewLowongan = Lowongan::with('user')->where('id', $id)->first();

        return view('app.admin.lowongan.view_lowongan', ['viewLowongan' => $viewLowongan]);
    }

}
