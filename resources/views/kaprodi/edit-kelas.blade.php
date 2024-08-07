@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-kaprodi')

<div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div class="grid grid-cols-2 gap-2 items-center pb-2">
                    <h1 class="text-3xl text-black">Edit Kelas</h1>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none w-40 justify-self-end">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                         Kembali
                    </button>
                </div>

                 <!-- Menampilkan pesan sukses -->
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Menampilkan pesan error -->
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                

                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg mx-auto mt-10">

                <form action="{{ route('kaprodi.update-kelas', $kelas->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                            <input type="text" id="nama" name="nama" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $kelas->name }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="jumlahmaxmahasiswa" class="block text-sm font-medium text-gray-700">Jumlah Maksimal Mahasiswa</label>
                            <input type="number" id="jumlahmaxmahasiswa" name="jumlahmaxmahasiswa" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $kelas->kapasitas }}" required>
                        </div>
                
                        <div>
                            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update Data</button>
                        </div>
                    </form>
                </div>

            </main>

        </div>
        
    </div>

@endsection
