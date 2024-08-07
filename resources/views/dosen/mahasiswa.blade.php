@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-dosen',["username" => $user->username])

@if (!isset($listMahasiswa) || is_null($listMahasiswa))
<div class="w-full h-full bg-white border flex items-center justify-center">
  <h1>
    Kamu saat ini tidak menjadi wali kelas
  </h1>
</div>

@else



<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full flex-grow p-6">
    <div class="grid grid-cols-2 gap-2 items-center pb-2">
      <h1 class="text-3xl text-black">Data Kelas (Teknik Informatika A)</h1>
      <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none w-50 justify-self-end">
        Tambah Mahasiswa
      </button>
    </div>


    <div class="w-full">

      <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
          <thead class="bg-gray-800 text-white">
            <tr>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No.</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">NIM</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Lengkap</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">TTL</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Access Update</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            @foreach($listMahasiswa as $mahasiswa)
            <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-200':''}}">
              <td class=" text-left py-3 px-4">{{ $loop->iteration }}</td>
              <td class="text-left py-3 px-4">{{ $mahasiswa->id }}</td>
              <td class="text-left py-3 px-4">{{ $mahasiswa->name }}</td>
              <td class="text-left py-3 px-4">{{ $mahasiswa->birth_place }}, {{ $mahasiswa->birth_date }}</td>
              @if ($mahasiswa->edit_status == true)
              <td class="text-left py-3 px-4">
                <button class="bg-green-500 text-white text-sm px-2 py-1 rounded" onclick="togglePopup()">ada</button>
              </td>
              @else
              <td class="text-left py-3 px-4">
                <button class="bg-red-500 text-white text-sm px-2 py-1 rounded">tidak</button>
              </td>
              @endif
              <td class="text-left py-3 px-4">
                <button class="text-blue-500 hover:text-blue-700">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="text-red-500 hover:text-red-700 ml-2">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </main>

</div>

</div>
@endif


<div id="popup-form" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white p-8 rounded-lg shadow-lg w-1/2">
    <h2 class="text-2xl font-semibold mb-4">Update Data</h2>
    <form action="/action/update/data/request" method="POST">
      @csrf
      <div class="mb-4">
        <input type="hidden" name="mahasiswa_id" value="{{ $data->id ?? ''}}">
        <input type="hidden" name="kelas_id" value="{{ $data->kelas->id ?? ''}}">
        <label class="block font-bold mb-2" for="keterangan">Keterangan</label>
        <textarea class="border border-gray-300 p-2 w-full h-40 resize-none" id="keterangan" name="keterangan"></textarea>
      </div>
      <div class="flex justify-end">
        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none mr-2" onclick="togglePopup()">
          Cancel
        </button>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
          Send
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  function togglePopup() {
    const popup = document.getElementById('popup-form');
    popup.classList.toggle('hidden');
  }
</script>
@endsection