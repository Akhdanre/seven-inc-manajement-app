<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class DosenController extends Controller
{
    /**
     * Menampilkan halaman indeks dengan total data Kaprodi, Dosen, Kelas, dan Mahasiswa.
     *
     * @return \Illuminate\Http\Response
     */

    public function dosenView(): View
    {

        $dosen = Auth::user();

        $totalKaprodi = Dosen::where('role_id', 1)->count();
        $totalDosen = Dosen::where('role_id', 2)->count();

        $totalKelas = Kelas::count();
        $totalMahasiswa = Mahasiswa::count();

        return view('dosen.index')->with([
            "user" => $dosen,
            "totalKaprodi" => $totalKaprodi,
            "totalDosen" => $totalDosen,
            "totalKelas" => $totalKelas,
            "totalMahasiswa" => $totalMahasiswa
        ]);
    }


    public function dosenDataMahasiswa()
    {

        $user = Auth::user();
        $dataDosen = Dosen::where("user_id", $user->id)->first();
        $data = [];
        if ($dataDosen->kelas_id != null) {
            $data = Mahasiswa::where("kelas_id", $dataDosen->kelas_id)->get();
        }

        return view('dosen.mahasiswa')->with([
            "user" => $user,
            "listMahasiswa" => $data
        ]);
    }
}
