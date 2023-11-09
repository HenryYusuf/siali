<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimoniController extends Controller
{
    public function testimoni(): View
    {
        $testimoni = User::with('testimoni', 'profil', 'roles')->whereHas('roles', function ($query) {
            $query->where('nama_role', 'Alumni');
        })->paginate(5);

        return view('app.testimoni.testimoni', ['testimoni' => $testimoni]);
    }

    public function setFeatured($id): RedirectResponse
    {
        $isfeatured = Testimoni::find($id);

        if ($isfeatured->is_featured == 1) {
            Testimoni::where('id', $id)->update([
                'is_featured' => 0
            ]);
        } else if ($isfeatured->is_featured == 0) {
            Testimoni::where('id', $id)->update([
                'is_featured' => 1
            ]);
        }

        return back()->with('success', 'Testimoni berhasil di setting');
    }
}
