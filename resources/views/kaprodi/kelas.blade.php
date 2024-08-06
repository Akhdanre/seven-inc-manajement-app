@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-kaprodi', ['username' => $data])

<div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div class="grid grid-cols-2 gap-2 items-center pb-2">
                    <h1 class="text-3xl text-black">Data Kelas</h1>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none w-40 justify-self-end">
                      <a href="add-kelas.html">Tambah Kelas</a>
                    </button>
                </div>
                

                <div class="w-full">
        
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                              <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No.</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Kelas</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Jumlah Maksimal Mahasiswa</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                              </tr>
                            </thead>
                            <tbody class="text-gray-700">
                              <tr>
                                <td class="text-left py-3 px-4">1</td>
                                <td class="text-left py-3 px-4">Informatika</td>
                                <td class="text-left py-3 px-4">12</td>
                                <td class="text-left py-3 px-4">
                                  <button class="text-blue-500 hover:text-blue-700">
                                   <a href="edit-kelas.html"><i class="fas fa-edit"></i></a>
                                  </button>
                                  <button class="text-red-500 hover:text-red-700 ml-2">
                                    <i class="fas fa-trash"></i>
                                  </button>
                                </td>
                              </tr>
                              <tr class="bg-gray-200">
                                <td class="text-left py-3 px-4">2</td>
                                <td class="text-left py-3 px-4">Multimedia</td>
                                <td class="text-left py-3 px-4">23</td>
                                <td class="text-left py-3 px-4">
                                  <button class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-edit"></i>
                                  </button>
                                  <button class="text-red-500 hover:text-red-700 ml-2">
                                    <i class="fas fa-trash"></i>
                                  </button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>

            </main>

        </div>
        
    </div>

@endsection
