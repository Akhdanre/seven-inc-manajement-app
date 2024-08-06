@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-mahasiswa')

<div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Data Akademik</h1>
                <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden flex">
                    <!-- Foto -->
                    <div class="w-1/3 bg-gray-200">
                      <img src="https://cdn.icon-icons.com/icons2/3311/PNG/512/student_man_avatar_user_toga_school_university_icon_209294.png" alt="Profile Photo" class="object-cover w-full h-full">
                    </div>
                    <!-- Informasi -->
                    @if($mahasiswa)
                    <div class="mb-4">
                        <p class="font-bold">NIM:</p>
                        <p class="text-gray-700">{{ $mahasiswa->nim }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="font-bold">Nama Lengkap:</p>
                        <p class="text-gray-700">{{ $mahasiswa->nama_lengkap }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="font-bold">Tempat Tanggal Lahir:</p>
                        <p class="text-gray-700">{{ $mahasiswa->birth_place }}, {{ $mahasiswa->birth_date }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="font-bold">Kelas:</p>
                        <p class="text-gray-700">{{ $mahasiswa->kelas_id }}</p>
                    </div>
                    <div class="mb-4">
                        <p class="font-bold">Dosen Wali:</p>
                        <p class="text-gray-700">pppp</p>
                    </div>

                    <div class="flex justify-end">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                            Update Data
                        </button>
                    </div>
                @else
                    <p class="text-red-500">Tidak ada data mahasiswa ditemukan. Silakan masukkan login yang valid.</p>
                @endif

                    </div>
                  </div>
                  
            </main>

        </div>
        
    </div>


@endsection
