@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-kaprodi')

<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full flex-grow p-6">
    <div class="grid grid-cols-2 gap-2 items-center pb-2">
      <h1 class="text-3xl text-black">Penempatan Mahasiswa</h1>
      <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none w-50 justify-self-end">
        <a href="{{ route('kaprodi.add.penempatan') }}">Tambah Penempatan</a>
      </button>
    </div>

    <!-- Menampilkan pesan sukses atau error -->
    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
      {{ session('success') }}
    </div>
    @endif
    @if($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded">
      <ul>
        @foreach($errors->all() as $error)
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
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Kelas</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Dosen Wali</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Daftar Mahasiswa</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
          @foreach($data as $index => $kelas)
          <tr class="{{ $loop->even ? 'bg-white' : 'bg-gray-200' }}">
                <td class="text-left py-3 px-4">{{ $index + 1 }}</td>
                <td class="text-left py-3 px-4">{{ $kelas->kelas_name }}</td>
                <td class="text-left py-3 px-4">{{ $kelas->dosen_name }}</td>
                <td class="text-left py-3 px-4">
                    <ul class="list-disc pl-5">
                        @if(isset($mahasiswaPerKelas[$kelas->kelas_id]))
                            @foreach($mahasiswaPerKelas[$kelas->kelas_id] as $mahasiswa)
                                <li>{{ $mahasiswa->name }}</li>
                            @endforeach
                        @else
                            <li>Tidak ada mahasiswa</li>
                        @endif
                    </ul>
                </td>
                <td class="text-left py-3 px-4">
                    <a href="{{ route('kaprodi.edit.penempatan', $kelas->kelas_id) }}" class="text-blue-500 hover:text-blue-700">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('kaprodi.delete-penempatan', $kelas->kelas_id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete(this)" class="text-red-500 hover:text-red-700 ml-2">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
      </div>
    </div>
    

      <script>
      function confirmDelete(button) {
          // Find the form element
          const form = button.closest('form');
          
          Swal.fire({
              title: 'Konfirmasi Hapus',
              text: "Apakah Anda yakin ingin menghapus data penempatan ini?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus',
              cancelButtonText: 'Batal'
          }).then((result) => {
              if (result.isConfirmed) {
                  // Submit the form if confirmed
                  form.submit();
              }
          });
      }
  </script>

  </main>

</div>

</div>

@endsection