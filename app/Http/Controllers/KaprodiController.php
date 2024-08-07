<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Users;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;

class KaprodiController extends Controller
{
    public function kaprodiView(): View
    {
        $username = "oukenze";
        $session = session("userData");
        if ($session != null) {
            $username = $session->username;
        }

         // Hitung total Kaprodi (role_id 1) dan Dosen (role_id 2)
        $totalKaprodi = Dosen::where('role_id', 1)->count();
        $totalDosen = Dosen::where('role_id', 2)->count();
        
        // Hitung total Kelas dan Mahasiswa
        $totalKelas = Kelas::count();
        $totalMahasiswa = Mahasiswa::count();

        $dataUser = session("userData");
        
        return view('kaprodi.index', [
            'totalKaprodi' => $totalKaprodi,
            'totalDosen' => $totalDosen,
            'totalKelas' => $totalKelas,
            'totalMahasiswa' => $totalMahasiswa,
            'username' => $username,
        ]);
    }
    public function kaprodiDataDosenView(): View
    {
        $username = "oukenze";
        $session = session("userData");
        if ($session != null) {
            $username = $session->username;
        }

        // Ambil semua data dosen
        $dosenList = Dosen::all();

        // Ambil data kelas untuk setiap dosen
        foreach ($dosenList as $dosen) {
            $kelas = Kelas::find($dosen->kelas_id);
            $dosen->kelas_name = $kelas ? $kelas->name : 'N/A';
        }

        // Kembalikan view dengan data dosen dan username
        return view('kaprodi.dosen')->with([
            'data' => $username,
            'dosenList' => $dosenList,
        ]);
    }

    public function kaprodiAddDosen()
    {
        // Ambil semua data kelas
        $kelasList = Kelas::all();

        // Kembalikan view dengan data kelas
        return view('kaprodi.add-dosen', compact('kelasList'));
    }

    public function storeDosen(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nip' => 'required|numeric',
            'nama' => 'required|string|max:255',
            'kodedosen' => 'required|numeric',
            'kelas_id' => 'required|numeric',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        // Simpan data pengguna ke tabel users
        $user = Users::create([
            'email' => $request->input('email'),
            'username' => $request->input('username'), 
            'password' => Hash::make($request->input('password')),
            'role_id' => 2,
        ]);

        // Simpan data dosen ke tabel dosen
         Dosen::create([
            'user_id' => $user->id,
            'kelas_id' => $request->input('kelas_id'),
            'kode_dosen' => $request->input('kodedosen'),
            'nip' => $request->input('nip'),
            'name' => $request->input('nama'),
            'role_id' => 2,
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('kaprodi.data.dosen')->with('success', 'Dosen berhasil ditambahkan!');
    }

    // Method untuk menampilkan form edit dosen
    public function editDosen($id)
    {
        // Mengambil data dosen berdasarkan ID
        $dosen = Dosen::findOrFail($id);
    
        // Mengambil data kelas berdasarkan kelas_id dari dosen yang bersangkutan
        $kelas = Kelas::find($dosen->kelas_id);

         // Mengambil data user berdasarkan user_id dari dosen yang bersangkutan
        $user = Users::where('id', $dosen->user_id)->first();
        
        // Menambahkan nama kelas ke objek dosen
        $dosen->kelas_name = $kelas ? $kelas->nama_kelas : 'N/A';
        
        // Mengambil semua data kelas untuk dropdown
        $kelasList = Kelas::all();
        
        // Mengirim data dosen dan daftar kelas ke view 'kaprodi.edit-dosen'
        return view('kaprodi.edit-dosen', compact('dosen', 'kelasList','user'));
    }

    public function updateDosen(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            // 'nip' => 'required|numeric',
            'nama' => 'required|string|max:255',
            // 'kodedosen' => 'required|numeric',
            'kelasid' => 'required|numeric',
            // 'username' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        // Mengambil data dosen berdasarkan ID
        $dosen = Dosen::findOrFail($id);

        // Mengambil data user yang terkait dengan dosen
        $user = Users::findOrFail($dosen->user_id);

        // Update data dosen
        $dosen->update([
            // 'nip' => $request->nip,
            'name' => $request->nama,
            // 'kode_dosen' => $request->kodedosen,
            'kelas_id' => $request->kelasid,
        ]);

        // Update data user
        $userData = [
            // 'username' => $request->username,
            // 'email' => $request->email,/
        ];

        // Jika password diisi, tambahkan ke array update
        if ($request->password) {
            $userData['password'] = bcrypt($request->password);
        }

        $user->update($userData);

        return redirect()->back()->with('success', 'Data dosen berhasil diupdate!');
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
