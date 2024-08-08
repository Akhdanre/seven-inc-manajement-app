@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-dosen',["username" => $user->username])

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <div class="grid grid-cols-2 gap-2 items-center pb-2">
            <h1 class="text-3xl text-black">Tambahkan Mahasiswa</h1>

            <a href="{{ route('dosen.data.mahasiswa') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none w-50 justify-self-end flex items-center space-x-2">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                <span>Kembali</span>
            </a>

        </div>

        @if(session('success'))
        <div id="success-notification" class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div id="error-notification" class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded">
            {{ session('error') }}
        </div>
        @endif

        @if($errors->any())
        <div id="error-notification" class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/dosen/action/data/mahasiswa/add" method="POST" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg mx-auto mt-10">
            @csrf
            <div class="mb-4">
                <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                <input type="text" id="nim" name="nim" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="ttl" class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir dan Tanggal Lahir</label>
                <div class="flex space-x-4">
                    <input type="text" id="birth_place" name="birth_place" placeholder="Tempat Lahir" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    <input type="date" id="birth_date" name="birth_date" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
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
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tambah Data</button>
            </div>
        </form>
</div>


</main>

</div>

</div>

@endsection