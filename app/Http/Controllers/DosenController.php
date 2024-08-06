<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class DosenController extends Controller
{


    public function kaprodiView(): View
    {
        $dataUser = session("userData");
        return view('kaprodi.index',  $dataUser);
    }

    public function dosenView(): View
    {
        $dataUser = session("userData");
        $username = "ouken";
        if($dataUser != null){
            $username = $dataUser->username;
        }
        return view('dosen.index')->with(['data' => $username]);
    }
}
