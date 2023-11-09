<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CareerController extends Controller
{
    public function index(): View
    {
        $totalCareer = Lowongan::count();

        $getCareer = Lowongan::orderBy("created_at", "desc")->paginate(10);


        return view('career', ['totalCareer' => $totalCareer, 'getCareer' => $getCareer]);
    }

    public function viewCareer($id): View
    {
        $career = Lowongan::find($id);

        // dd($career);

        return view('view_career', ['career' => $career]);
    }
}
