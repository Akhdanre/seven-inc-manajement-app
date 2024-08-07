@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-mahasiswa', ['username'=> $account['username']])



<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full flex-grow p-6">
    <h1 class="text-3xl text-black pb-6">Data Akademik</h1>
    @if(session('success'))
    <div id="success-notification" class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
      {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div id="error-notification" class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden flex">
      <!-- Foto -->
      <div class="w-1/3 bg-gray-200">
        <img src="https://cdn.icon-icons.com/icons2/3311/PNG/512/student_man_avatar_user_toga_school_university_icon_209294.png" alt="Profile Photo" class="object-cover w-full h-full">
      </div>
      <!-- Informasi -->
      <div class="w-2/3 p-6">
        <h2 class="text-xl font-semibold mb-4">Student Information</h2>
        <div class="mb-4">
          <p class="font-bold">NIM:</p>
          <p class="text-gray-700">{{$data['nim'] ?? ""}}</p>
        </div>
        <div class="mb-4">
          <p class="font-bold">Nama Lengkap:</p>
          <p class="text-gray-700">{{$data['name']?? ""}}</p>
        </div>
        <div class="mb-4">
          <p class="font-bold">Tempat Tanggal Lahir:</p>
          <p class="text-gray-700">
            {{ $data['birth_place'] ?? "" }},{{ isset($data['birth_date']) ? \Carbon\Carbon::parse($data['birth_date'])->format('d-m-Y') : "" }}
          </p>
        </div>
        <div class="mb-4">
          <p class="font-bold">Kelas:</p>
          <p class="text-gray-700">{{$data->kelas->name?? ""}}</p>
        </div>
        <div class="mb-4">
          <p class="font-bold">Dosen Wali:</p>
          <p class="text-gray-700">{{$data->kelas->dosen->name?? ""}}</p>
        </div>

        <div class="flex justify-end">
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none" onclick="togglePopup()">
            Update Data
          </button>
        </div>

      </div>
    </div>

  </main>
</div>

<div id="popup-form" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white p-8 rounded-lg shadow-lg w-1/2">
    <h2 class="text-2xl font-semibold mb-4">Update Data</h2>
    <form action="/mahasiswa/action/update/data/request" method="POST">
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


  setTimeout(function() {
    var successNotification = document.getElementById('success-notification');
    if (successNotification) {
      successNotification.style.display = 'none';
    }
  }, 3000);

  // Menghilangkan notifikasi error setelah 3 detik
  setTimeout(function() {
    var errorNotification = document.getElementById('error-notification');
    if (errorNotification) {
      errorNotification.style.display = 'none';
    }
  }, 3000);
</script>

@endsection