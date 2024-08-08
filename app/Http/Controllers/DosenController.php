<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDataMahasiswaRequest;
use App\Http\Requests\UpdateDataMahasiswaRequest;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\ReqUpdateData;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\error;

class DosenController extends Controller {
    /**
     * Menampilkan halaman indeks dengan total data Kaprodi, Dosen, Kelas, dan Mahasiswa.
     *
     * @return \Illuminate\Http\Response
     */

    public function dosenView(): View {

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


    public function dosenDataMahasiswa() {

        $user = Auth::user();
        $dataDosen = Dosen::where("user_id", $user->id)->first();
        $data = [];
        if (isset($dataDosen->kelas_id)) {
            $data = Mahasiswa::where("kelas_id", $dataDosen->kelas_id)->get();
        }


        return view('dosen.mahasiswa')->with([
            "user" => $user,
            "waliDosen" => isset($dataDosen->kelas) ? $dataDosen->kelas : null,
            "listMahasiswa" => $data
        ]);
    }

    public function addDataMahasiswaView() {

        $user = Auth::user();
        return View("dosen.add-mahasiswa")->with(
            [
                "user" => $user
            ]
        );
    }

    public function actionAddDataMahasiswa(AddDataMahasiswaRequest $request) {
        try {
            $data = $request->validated();

            if (User::where('email', $data['email'])->exists()) {
                return redirect()->back()->with('error', 'Email sudah digunakan.');
            }

            $user = Auth::user();
            $dataDosen = Dosen::where("user_id", $user->id)->first();


            $hashPass = Hash::make($data["password"]);

            $userAccount = User::create([
                "username" => $data['username'],
                "email" => $data['email'],
                "password" => $hashPass,
                "role_id" => 3
            ]);

            Mahasiswa::create([
                "user_id" => $userAccount->id,
                "kelas_id" => $dataDosen->kelas->id,
                "nim" => $data["nim"] ?? $this->generateUniqueNim(),
                "name" => $data['name'],
                "birth_place" => $data["birth_place"],
                "birth_date" => $data['birth_date']
            ]);

            return redirect()->back()->with('success', 'Data mahasiswa berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function generateUniqueNim() {
        do {
            $randomId = strtoupper(bin2hex(random_bytes(3))); // Generates a random 6-character hex string
            $datePrefix = 'E-' . date('Y-m') . '-';
            $nim = $datePrefix . $randomId;

            // Check if NIM is unique
        } while (Mahasiswa::where('nim', $nim)->exists());

        return $nim;
    }



    public function editDataMahasiswa() {
        return View("dosen.edit-mahasiswa");
    }
    public function actionDeleteDataMahasiswa($id) {
        try {
            $mahasiswa = Mahasiswa::find($id);



            if ($mahasiswa) {
                ReqUpdateData::where("mahasiswa_id", $mahasiswa->id)->delete();

                $mahasiswa->delete();

                User::where('id', $mahasiswa->user_id)->delete();

                return redirect()->route('dosen.data.mahasiswa', ['refresh' => 'true'])->with('success', 'Data mahasiswa berhasil dihapus');
            } else {
                return redirect()->route('dosen.data.mahasiswa')->with('error', 'Data mahasiswa tidak ditemukan');
            }
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return redirect()->route('dosen.data.mahasiswa')->with('error', 'Terjadi kesalahan saat menghapus data');
        }
    }
}
