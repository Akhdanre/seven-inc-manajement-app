@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-kaprodi')

<div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div class="grid grid-cols-2 gap-2 items-center pb-2">
                    <h1 class="text-3xl text-black">Edit Dosen</h1>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none w-40 justify-self-end">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                         Kembali
                    </button>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg mx-auto mt-10">

                    <form action="#" method="POST">
                        <div class="mb-4">
                            <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                            <input type="text" id="nip" name="nip" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="kodedosen" class="block text-sm font-medium text-gray-700">Kode Dosen</label>
                            <input type="text" id="kodedosen" name="kodedosen" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="class" class="block text-sm font-medium text-gray-700">Kelas</label>
                            <select id="class" name="class" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="" disabled selected>Pilih Kelas</option>
                                <option value="kelas1">Kelas 1</option>
                                <option value="kelas2">Kelas 2</option>
                                <option value="kelas3">Kelas 3</option>
                                <option value="kelas4">Kelas 4</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" id="username" name="username" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
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
