@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-kaprodi')


<div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div class="grid grid-cols-2 gap-2 items-center pb-2">
                    <h1 class="text-3xl text-black">Edit Penempatan Mahasiswa</h1>
                   <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none w-40 justify-self-end">
                  <a href="{{ route('kaprodi.data.penempatan') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i>
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
                    <form action="{{ route('kaprodi.update.penempatan', $kelas->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!--  Nama Kelas -->
                        <div class="mb-4">
                            <label for="kelas_name" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                            <input type="text" id="kelas_name" name="kelas_name" value="{{ $kelas->name }} (maks. {{ $kelas->kapasitas }} Mahasiswa)" disabled class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <input type="hidden" id="maxCapacity" value="{{ $kelas->kapasitas }}">
                        </div>

                        <!-- Dropdown Nama Dosen -->
                        <div class="mb-4">
                            <label for="dosen_name" class="block text-sm font-medium text-gray-700">Nama Dosen Wali</label>
                            <input type="text" id="dosen_name" name="dosen_name" value="{{ $dosen->name }}" disabled class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Daftar Mahasiswa dengan kelas_id 0 -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Pilih Mahasiswa</label>
                            <div class="mb-2 mt-3 text-sm text-gray-600">
                                <a href="#" id="selectAll" class="hover:underline">Pilih Semua</a> |
                                <a href="#" id="deselectAll" class="hover:underline">Hapus Pilihan Semua</a>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                            @foreach($mahasiswaList as $mahasiswa)
                                <div class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        id="mahasiswa_{{ $mahasiswa->id }}" 
                                        name="mahasiswa_ids[]" 
                                        value="{{ $mahasiswa->id }}" 
                                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                        {{ in_array($mahasiswa->id, $selectedMahasiswaIds) ? 'checked' : '' }}
                                        onchange="updateSelectedStudents()">
                                    <label for="mahasiswa_{{ $mahasiswa->id }}" class="ml-2 text-sm text-gray-900">
                                        {{ $mahasiswa->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>


                            <!-- Area untuk menampilkan jumlah mahasiswa yang dipilih -->
                            <div class="mt-4">
                                <strong class="text-sm text-gray-700">Jumlah Mahasiswa yang Dipilih: </strong>
                                <div id="selectedCount" class="text-sm text-gray-900 mt-2">
                                    0 mahasiswa terpilih
                                </div>
                            </div>
                        </div>

                        <script>
                        // Fungsi untuk mengambil kapasitas maksimal dari elemen hidden
                        function getMaxCapacity() {
                            return parseInt(document.getElementById('maxCapacity').value, 10);
                        }

                        function updateMaxCapacity() {
                            const kelasSelect = document.getElementById('kelas_id');
                            const selectedOption = kelasSelect.options[kelasSelect.selectedIndex];
                            maxCapacity = parseInt(selectedOption.getAttribute('data-kapasitas'), 10);
                            updateSelectedStudents();
                        }

                        function updateSelectedStudents() {
                            const maxCapacity = getMaxCapacity(); // Ambil kapasitas terbaru
                            const checkboxes = document.querySelectorAll('input[name="mahasiswa_ids[]"]:checked');
                            const selectedCount = checkboxes.length;
                            document.getElementById('selectedCount').textContent = `${selectedCount} mahasiswa terpilih`;

                            if (selectedCount >= maxCapacity) {
                                document.querySelectorAll('input[name="mahasiswa_ids[]"]').forEach((checkbox) => {
                                    if (!checkbox.checked) {
                                        checkbox.disabled = true;
                                    }
                                });
                            } else {
                                document.querySelectorAll('input[name="mahasiswa_ids[]"]').forEach((checkbox) => {
                                    checkbox.disabled = false;
                                });
                            }
                        }

                        document.addEventListener('DOMContentLoaded', function() {
                            updateSelectedStudents(); // Initialize selected students count
                            document.getElementById('kelas_id').addEventListener('change', updateMaxCapacity);

                            document.getElementById('selectAll').addEventListener('click', function(e) {
                                e.preventDefault();
                                document.querySelectorAll('input[name="mahasiswa_ids[]"]').forEach(checkbox => {
                                    if (!checkbox.disabled) {
                                        checkbox.checked = true;
                                    }
                                });
                                updateSelectedStudents();
                            });

                            document.getElementById('deselectAll').addEventListener('click', function(e) {
                                e.preventDefault();
                                document.querySelectorAll('input[name="mahasiswa_ids[]"]').forEach(checkbox => {
                                    checkbox.checked = false;
                                });
                                updateSelectedStudents();
                            });

                            // Update the selected count whenever a checkbox state changes
                            document.querySelectorAll('input[name="mahasiswa_ids[]"]').forEach(checkbox => {
                                checkbox.addEventListener('change', updateSelectedStudents);
                            });
                        });
                    </script>



                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update Data</button>
                        </div>
                    </form>
                </div>



            </main>

        </div>
        
    </div>


@endsection
