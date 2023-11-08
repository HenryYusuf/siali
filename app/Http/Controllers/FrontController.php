<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontController extends Controller
{
    public function index(Request $request): View
    {
        $showcaseURL = [
            asset('src_front/assets/img/bg-showcase-1.jpg'),
            asset('src_front/assets/img/bg-showcase-2.jpg'),
            asset('src_front/assets/img/bg-showcase-3.jpg'),
        ];

        $userURL = [
            asset('src_front/assets/img/testimonials-1.jpg'),
            asset('src_front/assets/img/testimonials-2.jpg'),
            asset('src_front/assets/img/testimonials-3.jpg'),
        ];

        if ($request->isMethod("POST")) {
            $request->validate([
                'search' => 'required',
            ]);

            $search = $request->search;

            $alumni = User::with('profil')
                ->where('nama', 'like', '%' . $search . '%')
                ->orWhereHas('profil', function ($query) use ($search) {
                    $query->where('tahun_lulus', 'like', '%' . $search . '%');
                })
                ->orWhereHas('profil', function ($query) use ($search) {
                    $query->where('nisn', 'like', '%' . $search . '%');
                })
                ->orWhereHas('profil', function ($query) use ($search) {
                    $query->where('tempat_lahir', 'like', '%' . $search . '%');
                })
                ->get();

            return view('welcome', ['showcaseURL' => $showcaseURL, 'userURL' => $userURL, 'alumni' => $alumni]);
        }

        return view('welcome', ['showcaseURL' => $showcaseURL, 'userURL' => $userURL, 'alumni' => $alumni = ""]);
    }
}
