<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateDataMahasiswaRequest;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if (isset($dataDosen->kelas_id)) {
            $data = Mahasiswa::where("kelas_id", $dataDosen->kelas_id)->get();
        }

        return view('dosen.mahasiswa')->with([
            "user" => $user,
            "listMahasiswa" => $data
        ]);
    }

    public function addDataMahasiswa(UpdateDataMahasiswaRequest $request)
    {
        $data = $request->validated();
        $hashPass = Hash::make($data["password"]);
        $userAccount = User::create(
            [
                "username" => $data['username'],
                "email" => $data['email'],
                "password" => $hashPass,
                "role_id" => 3
            ]
        );
        $dataMahasiswa = Mahasiswa::create([
            "user_id" => $userAccount->id,
            "nim" => $data['nim'],
            "name" => $data['name'],
            "birth_place" => $data["birth_place"],
            "birth_date" => $data['birth_date'],
            "edit_"
        ]);
        $user = Auth::user();
        return View("dosen.add-mahasiswa")->with(
            [
                "user" => $user
            ]
        );
    }
    public function editDataMahasiswa()
    {
        return View("dosen.edit-mahasiswa");
    }
    public function deleteDataMahasiswa()
    {
    }
}
