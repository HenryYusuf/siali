<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontController extends Controller
{
    public function index(): View
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

        return view('welcome', ['showcaseURL' => $showcaseURL, 'userURL' => $userURL]);
    }
}
