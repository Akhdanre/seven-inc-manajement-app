<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Users;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class KaprodiController extends Controller
{
    public function kaprodiView(): View
    {
        $user = Auth::user();

        // Hitung total Kaprodi (role_id 1) dan Dosen (role_id 2)
        $totalKaprodi = Dosen::where('role_id', 1)->count();
        $totalDosen = Dosen::where('role_id', 2)->count();

        // Hitung total Kelas dan Mahasiswa
        $totalKelas = Kelas::where('id', '!=', 0)->count();
        $totalMahasiswa = Mahasiswa::count();

        $dataUser = session("userData");

        return view('kaprodi.index', [
            'totalKaprodi' => $totalKaprodi,
            'totalDosen' => $totalDosen,
            'totalKelas' => $totalKelas,
            'totalMahasiswa' => $totalMahasiswa,
            'username' => $user->username,
        ]);
    }

    public function kaprodiDataDosenView(): View
    {
        $user = Auth::user();

        // Ambil semua data dosen
        $dosenList = Dosen::all();

        // Ambil data kelas untuk setiap dosen
        foreach ($dosenList as $dosen) {
            $kelas = Kelas::find($dosen->kelas_id);
            $dosen->kelas_name = $kelas ? $kelas->name : 'N/A';
        }

        // Kembalikan view dengan data dosen dan username
        return view('kaprodi.dosen')->with([
            'user' => $user,
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
            'kodedosen' => 'required|numeric|unique:dosens,kode_dosen',
            // 'kelas_id' => 'required|numeric',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
        ], [
            'nip.required' => 'NIP harus diisi.',
            'nip.numeric' => 'NIP harus berupa angka.',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'kodedosen.required' => 'Kode Dosen harus diisi.',
            'kodedosen.numeric' => 'Kode Dosen harus berupa angka.',
            'kodedosen.unique' => 'Kode Dosen sudah terdaftar.',
            // 'kelas_id.required' => 'ID Kelas harus diisi.',
            // 'kelas_id.numeric' => 'ID Kelas harus berupa angka.',
            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.string' => 'Email harus berupa teks.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus minimal 8 karakter.',
        ]);

        // Simpan data pengguna ke tabel users
        $user = User::create([
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'role_id' => 2,
        ]);

        // Simpan data dosen ke tabel dosen
        Dosen::create([
            'user_id' => $user->id,
            'kelas_id' => 0,
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
        $user = User::where('id', $dosen->user_id)->first();

        // Menambahkan nama kelas ke objek dosen
        $dosen->kelas_name = $kelas ? $kelas->nama_kelas : 'N/A';

        // Mengambil semua data kelas untuk dropdown
        $kelasList = Kelas::all();

        // Mengirim data dosen dan daftar kelas ke view 'kaprodi.edit-dosen'
        return view('kaprodi.edit-dosen', compact('dosen', 'kelasList', 'user'));
    }

    public function updateDosen(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            // 'nip' => 'required|numeric',
            'nama' => 'required|string|max:255',
            // 'kodedosen' => 'required|numeric',
            // 'kelasid' => 'required|numeric',
            // 'username' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        // Mengambil data dosen berdasarkan ID
        $dosen = Dosen::findOrFail($id);

        // Mengambil data user yang terkait dengan dosen
        $user = User::findOrFail($dosen->user_id);

        // Update data dosen
        $dosen->update([
            // 'nip' => $request->nip,
            'name' => $request->nama,
            // 'kode_dosen' => $request->kodedosen,
            // 'kelas_id' => $request->kelasid,
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

    public function deleteDosen($id)
    {
        // Find the Dosen by ID
        $dosen = Dosen::findOrFail($id);

        // Find the related User
        $user = User::findOrFail($dosen->user_id);

        // Delete the Dosen and User
        $dosen->delete();
        $user->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Data dosen berhasil dihapus!');
    }

    public function kaprodiDataKelasView(): View
    {
        $user = Auth::user();

        $allDataKelas = Kelas::where('id', '!=', 0)->get();
        return view('kaprodi.kelas')->with(["username" => $user->username, "data" => $allDataKelas]);
    }

    
    public function kaprodiAddKelas()
    {
        return view('kaprodi.add-kelas');
    }

    public function storeKelas(Request $request)
    {
    // Validasi data input
    $request->validate([
        'nama' => 'required|string|max:255', 
        'jumlahmaxmahasiswa' => 'required|numeric', 
    ], [
        'nama.required' => 'Nama harus diisi.',
        'nama.string' => 'Nama harus berupa teks.',
        'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
        'jumlahmaxmahasiswa.required' => 'Jumlah maksimal mahasiswa harus diisi.',
        'jumlahmaxmahasiswa.numeric' => 'Jumlah maksimal mahasiswa harus berupa angka.',
    ]);
        
        error_log(" cek data kapasitas {$request->jumlahmaxmahasiswa} ");

        Kelas::create([
            'name' => $request->nama,
            'kapasitas' => $request->jumlahmaxmahasiswa,
        ]);
        return redirect()->route('kaprodi.data.kelas')->with('success', 'Kelas berhasil ditambahkan');
    }

    public function editKelas($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('kaprodi.edit-kelas', compact('kelas'));
    }

    public function updateKelas(Request $request, $id)
    {
       // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255', 
            'jumlahmaxmahasiswa' => 'required|numeric', 
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'jumlahmaxmahasiswa.required' => 'Jumlah maksimal mahasiswa harus diisi.',
            'jumlahmaxmahasiswa.numeric' => 'Jumlah maksimal mahasiswa harus berupa angka.',
        ]);

        $kelas = Kelas::findOrFail($id);

        $kelas->update([
            'name' => $request->nama,
            'kapasitas' => $request->jumlahmaxmahasiswa,
        ]);

        return redirect()->route('kaprodi.edit.kelas', $id)->with('success', 'Kelas berhasil diperbarui!');
    }

    public function deleteKelas($id) {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
    
        return redirect()->route('kaprodi.data.kelas')->with('success', 'Kelas berhasil dihapus!');
    }

    public function kaprodiPenempatanView(): View
{
    $user = Auth::user();
    
    // Ambil semua data kelas yang memiliki dosen yang terkait
    $allDataKelas = DB::table('dosens')
        ->join('kelas', 'dosens.kelas_id', '=', 'kelas.id')
        ->select('dosens.name as dosen_name', 'kelas.name as kelas_name', 'kelas.kapasitas', 'kelas.id as kelas_id')
        ->where('kelas.id', '!=', 0) 
        ->get();
    
    // Ambil data mahasiswa berdasarkan kelas_id yang terdaftar
    $mahasiswaPerKelas = [];
    foreach ($allDataKelas as $dataKelas) {
        $mahasiswaPerKelas[$dataKelas->kelas_id] = DB::table('mahasiswas')
            ->where('kelas_id', $dataKelas->kelas_id)
            ->get(['id', 'name']);
    }
    
    return view('kaprodi.penempatan')->with([
        'username' => $user->username,
        'data' => $allDataKelas,
        'mahasiswaPerKelas' => $mahasiswaPerKelas,
    ]);
}

    public function kaprodiAddPenempatan()
    {
        $user = Auth::user();

        // Mendapatkan data kelas yang belum digunakan
        $kelasList = DB::table('kelas')
        ->where('id', '!=', null) 
        ->whereNotIn('id', function ($query) {
            $query->select('kelas_id')->from('dosens');
        })
        ->get();
    

        // Mendapatkan data dosen dengan kelas_id = 0
        $allDataKelas = Dosen::where('kelas_id', 0)
            ->select('id', 'name as dosen_name', 'kelas_id')
            ->get();

        // Mendapatkan data mahasiswa yang memiliki kelas_id 0
        $mahasiswaList = DB::table('mahasiswas')
            ->where('kelas_id', 0)
            ->get();

        return view('kaprodi.add-penempatan')->with([
            'username' => $user->username,
            'data' => $allDataKelas,
            'kelasList' => $kelasList,
            'mahasiswaList' => $mahasiswaList,
        ]);
    }

    public function storePenempatan(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'mahasiswa_ids' => 'required|array',
            'mahasiswa_ids.*' => 'exists:mahasiswas,id',
            'kelas_id' => 'required|exists:kelas,id',
            'dosen_id' => 'required|exists:dosens,id'
        ], [
            'mahasiswa_ids.required' => 'Maaf, Anda harus memilih setidaknya satu mahasiswa.',
            'mahasiswa_ids.array' => 'Data mahasiswa yang dipilih tidak valid.',
            'mahasiswa_ids.*.exists' => 'Mahasiswa dengan ID yang dipilih tidak ditemukan.',
            'kelas_id.required' => 'Kelas yang dipilih tidak boleh kosong.',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid.',
            'dosen_id.required' => 'Dosen yang dipilih tidak boleh kosong.',
            'dosen_id.exists' => 'Dosen yang dipilih tidak valid.'
        ]);        
    
        // Ambil ID mahasiswa yang dipilih dan ID kelas
        $mahasiswaIds = $validatedData['mahasiswa_ids'];
        $kelasId = $validatedData['kelas_id'];
        $dosenId = $validatedData['dosen_id'];
    
        // Update kelas_id untuk mahasiswa yang dipilih
        DB::table('mahasiswas')
            ->whereIn('id', $mahasiswaIds)
            ->update(['kelas_id' => $kelasId]);
    
        // Update kelas_id untuk dosen dengan ID yang dipilih
        DB::table('dosens')
            ->where('id', $dosenId)
            ->update(['kelas_id' => $kelasId]);
    
        // Redirect atau beri respons sesuai kebutuhan
        return redirect()->route('kaprodi.data.penempatan')->with('success', 'Data penempatan mahasiswa dan dosen berhasil disimpan.');
    }    

    public function editPenempatan($id)
    {
        // Mengambil data kelas berdasarkan ID
        $kelas = Kelas::findOrFail($id);
    
        // Mengambil nama dosen yang terkait dengan kelas ini
        $dosen = Dosen::where('kelas_id', $id)->first();
    
        // Mengambil semua mahasiswa dengan kelas_id 0 dan kelas_id sesuai $id
        $mahasiswaList = DB::table('mahasiswas')
        ->select('*')
        ->where('kelas_id', $id)
        ->union(
            DB::table('mahasiswas')
                ->select('*')
                ->where('kelas_id', 0)
        )
        ->get();

        // Mengambil ID mahasiswa yang sudah dipilih untuk kelas ini
        $selectedMahasiswaIds = DB::table('mahasiswas')
            ->where('kelas_id', $id)
            ->pluck('id')
            ->toArray();
    
        // Mengirim data ke view
        return view('kaprodi.edit-penempatan', [
            'kelas' => $kelas,
            'dosen' => $dosen,
            'mahasiswaList' => $mahasiswaList,
            'selectedMahasiswaIds' => $selectedMahasiswaIds,
        ]);
    }
    
    public function updatePenempatan(Request $request, $id)
    {
        $request->validate([
            'mahasiswa_ids' => 'array|nullable',
            'mahasiswa_ids.*' => 'integer|exists:mahasiswas,id',
        ]);
    
        
        $kelas = Kelas::findOrFail($id);
    
        $selectedMahasiswaIds = $request->input('mahasiswa_ids', []);
    
        Mahasiswa::whereIn('id', $selectedMahasiswaIds)->update(['kelas_id' => $id]);

        Mahasiswa::where('kelas_id', $id)
                  ->whereNotIn('id', $selectedMahasiswaIds)
                  ->update(['kelas_id' => 0]);
                  
        return redirect()->route('kaprodi.edit.penempatan', $id)
                         ->with('success', 'Data penempatan mahasiswa telah diperbarui.');
    }    



}
