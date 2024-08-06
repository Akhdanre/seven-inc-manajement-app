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
        $username = "oukenze";
        $session = session("userData");
        if ($session != null) {
            $username = $session->username;
        }
        return view('kaprodi.dosen')->with(["data" => $username]);
    }
    public function kaprodiDataKelasView(): View
    {
        $username = "oukenze";
        $session = session("userData");
        if ($session != null) {
            $username = $session->username;
        }
        return view('kaprodi.kelas')->with(["data" => $username]);
    }
}
