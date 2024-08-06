<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class KaprodiController extends Controller
{
    public function kaprodiView(): View
    {
        $username = "oukenze";
        $session = session("userData");
        if ($session != null) {
            $username = $session->username;
        }
        return view('kaprodi.index')->with(["data" => $username]);
    }
    public function kaprodiDataDosenView(): View
    {
        return view('kaprodi.dosen');;
    }
    public function kaprodiDataKelasView(): View
    {
        return view('kaprodi.kelas');
    }
}
