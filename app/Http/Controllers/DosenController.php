<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class DosenController extends Controller
{


    public function kaprodiView(): View
    {
        $dataUser = session("userData");
        return view('kaprodi.index',  ['userData' => $dataUser]);
    }

    public function dosenView(): View
    {
        // $dataUser = session("userData");

        $username = "ouken";
        return view('dosen.index', ["username" => $username]);
    }
}
