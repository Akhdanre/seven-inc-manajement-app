<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
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
        $allDataDosen = Kelas::all();
        return view('kaprodi.dosen')->with(["username" => $username, "data" => $allDataDosen]);
    }

    public function kaprodiDataKelasView(): View
    {
        $username = "oukenze";
        $session = session("userData");
        if ($session != null) {
            $username = $session->username;
        }

        $allDataKelas = Kelas::all();
        return view('kaprodi.kelas')->with(["username" => $username, "data" => $allDataKelas]);
    }
}
