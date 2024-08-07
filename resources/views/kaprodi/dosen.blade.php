@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-kaprodi', ['username' => $data])

<div class="w-full overflow-x-hidden border-t flex flex-col">
  <main class="w-full flex-grow p-6">
    <div class="grid grid-cols-2 gap-2 items-center pb-2">
      <h1 class="text-3xl text-black">Data Dosen</h1>
      <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none w-40 justify-self-end">
        <a href="add-dosen">Tambah Dosen</a>
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
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">NIP</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Lengkap</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Kode Dosen</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Wali Kelas</th>
              <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
                @foreach($dosenList as $dosen)
                    <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-200' : '' }}">
                        <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                        <td class="text-left py-3 px-4">{{ $dosen->nip }}</td>
                        <td class="text-left py-3 px-4">{{ $dosen->name }}</td>
                        <td class="text-left py-3 px-4">{{ $dosen->kode_dosen }}</td>
                        <td class="text-left py-3 px-4">{{ $dosen->kelas_name }}</td>
                        <td class="text-left py-3 px-4">
                          <a href="{{ route('kaprodi.edit.dosen', $dosen->id) }}" class="text-blue-500 hover:text-blue-700">
                              <i class="fas fa-edit"></i>
                          </a>
                          <form action="" method="POST" class="inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="text-red-500 hover:text-red-700 ml-2">
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

  </main>

</div>

</div>

@endsection