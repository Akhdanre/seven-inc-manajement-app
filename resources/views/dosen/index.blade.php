@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-dosen', ['username' => $user->username])

<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Dashboard</h1>
        <!-- Stats Row Starts Here -->
        <div class="flex flex-col md:flex-row lg:flex-row mx-2">
            <div class="shadow-lg border-l-8 border-red-600 mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-2xl">
                        {{$totalKaprodi ?? 0}}
                    </a>
                    <a href="#" class="no-underline text-lg">
                        Total Kaprodi
                    </a>
                </div>
            </div>

            <div class="shadow-lg border-l-8 border-blue-600 mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-2xl">
                        {{$totalDosen ?? 0}}
                    </a>
                    <a href="#" class="no-underline text-lg">
                        Total Dosen
                    </a>
                </div>
            </div>

            <div class="shadow-lg border-l-8 border-yellow-600 mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-2xl">
                        {{$totalKelas ?? 0}}
                    </a>
                    <a href="#" class="no-underline text-lg">
                        Total Kelas
                    </a>
                </div>
            </div>

            <div class="shadow-lg border-l-8 border-green-600 mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-2xl">
                        {{$totalMahasiswa ?? 0}}
                    </a>
                    <a href="#" class="no-underline text-lg">
                        Total Mahasiswa
                    </a>
                </div>
            </div>
        </div>

        <!-- /Stats Row Ends Here -->

    </main>
</div>

@endsection