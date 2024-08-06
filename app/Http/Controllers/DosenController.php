<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;

class DosenController extends Controller
{
    /**
     * Menampilkan halaman indeks dengan total data Kaprodi, Dosen, Kelas, dan Mahasiswa.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Hitung total Kaprodi (role_id 1) dan Dosen (role_id 2)
        $totalKaprodi = Dosen::where('role_id', 1)->count();
        $totalDosen = Dosen::where('role_id', 2)->count();
        
        // Hitung total Kelas dan Mahasiswa
        $totalKelas = Kelas::count();
        $totalMahasiswa = Mahasiswa::count();

        // Kembalikan view dengan data total
        return view('dosen.index', compact('totalKaprodi', 'totalDosen', 'totalKelas', 'totalMahasiswa'));
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
