@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-kaprodi')

<div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div class="grid grid-cols-2 gap-2 items-center pb-2">
                    <h1 class="text-3xl text-black">Edit Dosen</h1>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none w-40 justify-self-end">
                    <a href=""> <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Kembali</a>
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

                <form action="{{ route('kaprodi.update-dosen', $dosen->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                        <div class="mb-4">
                            <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                            <input type="number" id="nip" name="nip" value="{{ $dosen->nip }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" disabled>
                        </div>
                
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" value="{{ $dosen->name }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="kodedosen" class="block text-sm font-medium text-gray-700">Kode Dosen</label>
                            <input type="number" id="kodedosen" name="kodedosen" value="{{ $dosen->kode_dosen }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" disabled>
                        </div>

                        <!-- <div class="mb-4">
                            <label for="kelas_name" class="block text-sm font-medium text-gray-700">Kelas</label>
                            <select id="kelasid" name="kelasid" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="" disabled>Pilih Kelas</option>
                                @foreach ($kelasList as $kelas)
                                    <option value="{{ $kelas->id }}" {{ $kelas->id == $dosen->kelas_id ? 'selected' : '' }}>{{ $kelas->name }}</option>
                                @endforeach
                            </select>
                        </div> -->
                                            
                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" id="username" name="username" value="{{ $user->username }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" disabled>
                        </div>
                
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email"  value="{{ $user->email }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" disabled>
                        </div>
                
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
