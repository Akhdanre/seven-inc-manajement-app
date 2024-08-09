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

      <h1 class="text-3xl text-black">Kelas {{$waliDosen->name}} </h1>
      <a href="{{ route('dosen.add.data.mahasiswa') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none w-50 justify-self-end">
        Tambah Mahasiswa
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

      
    <div class="w-full">
      <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
          <thead class="bg-gray-800 text-white">
            <tr>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No.</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">NIM</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Lengkap</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">TTL</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Request Update</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            @foreach($listMahasiswa as $mahasiswa)
            <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-200':''}}">
              <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
              <td class="text-left py-3 px-4">{{ $mahasiswa->nim }}</td>
              <td class="text-left py-3 px-4">{{ $mahasiswa->name }}</td>
              <td class="text-left py-3 px-4">{{ $mahasiswa->birth_place }}, {{ $mahasiswa->birth_date }}</td>
              @if ($mahasiswa->edit_status == true)
              <td class="text-left py-3 px-4">
                <button class="bg-green-500 text-white text-sm px-2 py-1 rounded" onclick="showPopup('{{ $mahasiswa->requestUpdate }}', '{{ $mahasiswa->nim }}', '{{ $mahasiswa->name }}')">ada</button>
              </td>
              @else
              <td class="text-left py-3 px-4">
                <button class="bg-yellow-500 text-white text-sm px-2 py-1 rounded">tidak</button>
              </td>
              @endif
              <td class="text-left py-3 px-4 flex items-center space-x-2">
                <a href="{{ route('dosen.edit.data.mahasiswa', ['id' => $mahasiswa->id]) }}" class="text-blue-500 hover:text-blue-700">
                  <i class="fas fa-edit"></i>
                </a>


                <button class="text-red-500 hover:text-red-700" onclick="confirmDelete('{{$mahasiswa->id }}')">
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

@endif
<div id="popup-form" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white p-8 rounded-lg shadow-lg w-1/2">
    <h2 class="text-2xl font-semibold mb-4">Request Update Data</h2>
    <form action="" method="POST">
      @csrf
      <div class="mb-4">
        <label for="popup-mahasiswa-id">NIM:</label>
        <input id="popup-mahasiswa-id" name="mahasiswa_id" disabled>

        <label for="popup-kelas-id">Nama:</label>
        <input id="popup-kelas-id" name="kelas_id" disabled>

        <label class="block font-bold mb-2 mt-2" for="keterangan">Keterangan</label>
        <div id="dynamic-fields" class="mb-4"></div>
      </div>
      <div class="flex justify-end">
        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none mr-2" onclick="togglePopup()">
          Close
        </button>

      </div>
    </form>
  </div>
</div>

<script>
  function showPopup(dataChosen, mahasiswaId, kelasId) {

    document.getElementById('popup-mahasiswa-id').value = mahasiswaId;
    document.getElementById('popup-kelas-id').value = kelasId;
    const container = document.getElementById('dynamic-fields');
    let data = JSON.parse(dataChosen);


    container.innerHTML = '';

    data.forEach(item => {
      const input = document.createElement('input');
      input.type = 'text';
      input.name = item.id;
      input.value = item.keterangan;
      input.className = 'border border-gray-300 p-2 w-full mb-2';
      input.id = item.id;

      container.appendChild(input);
    });

    togglePopup();
  }

  function togglePopup() {
    const popup = document.getElementById('popup-form');
    popup.classList.toggle('hidden');
  }

  function confirmDelete(id) {
    Swal.fire({
      title: 'Apakah Anda yakin ingin menghapus data mahasiswa ini?',
      text: "Anda yakin menghapus data ini",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        const url = `{{ route('dosen.delete.data.mahasiswa', ['id' => ':id']) }}`.replace(':id', id);

        fetch(url, {
          method: 'DELETE',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        }).finally(() => {
          window.location.reload();
        });
      }
    });
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