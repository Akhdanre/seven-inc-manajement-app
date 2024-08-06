<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan daftar mahasiswa di view index berdasarkan kondisi login.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Ambil parameter login dari request
        $login = $request->input('login');

        // Ambil data mahasiswa berdasarkan kondisi login jika ada, atau semua data jika tidak ada
        if ($login) {
            $mahasiswa = Mahasiswa::where('login', $login)->get();
        } else {
            $mahasiswa = Mahasiswa::all();
        }

        // Kembalikan view dengan data mahasiswa
        return view('mahasiswa.index', compact('mahasiswa'));
    }
}
