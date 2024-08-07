@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-kaprodi')


<div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div class="grid grid-cols-2 gap-2 items-center pb-2">
                    <h1 class="text-3xl text-black">Tambahkan Kelas</h1>
                   <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none w-40 justify-self-end">
                  <a href="/data/dosen"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                         Kembali</a>
                    </button>
                </div>
                

                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg mx-auto mt-10">

                    <form action="#" method="POST">
                
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                            <input type="text" id="nama" name="nama" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="jumlahmaxmahasiswa" class="block text-sm font-medium text-gray-700">Jumlah Maksimal Mahasiswa</label>
                            <input type="text" id="jumlahmaxmahasiswa" name="jumlahmaxmahasiswa" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                
                        <div>
                            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tambah Data</button>
                        </div>
                    </form>
                </div>

            </main>

        </div>
        
    </div>


@endsection
