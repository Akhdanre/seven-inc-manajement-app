@extends('layouts.main')

@section('contents')

@include('layouts.sidebar-dosen')

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
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Request Update</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                              </tr>
                            </thead>
                            <tbody class="text-gray-700">
                              <tr>
                                <td class="text-left py-3 px-4">1</td>
                                <td class="text-left py-3 px-4">235345</td>
                                <td class="text-left py-3 px-4">Smith</td>
                                <td class="text-left py-3 px-4">Nganjuk, 01 Juni 2000</td>
                                
                                <td class="text-left py-3 px-4">
                                    <button class="bg-green-500 text-white text-sm px-2 py-1 rounded">ada</button>
                                </td>
                                  
                                  
                                <td class="text-left py-3 px-4">
                                  <button class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-edit"></i>
                                  </button>
                                  <button class="text-red-500 hover:text-red-700 ml-2">
                                    <i class="fas fa-trash"></i>
                                  </button>
                                </td>
                              </tr>
                              <tr class="bg-gray-200">
                                <td class="text-left py-3 px-4">2</td>
                                <td class="text-left py-3 px-4">235345</td>
                                <td class="text-left py-3 px-4">Johnson</td>
                                <td class="text-left py-3 px-4">Nganjuk, 01 Februari 2000</td>
                                <td class="text-left py-3 px-4">
                                    <button class="bg-yellow-500 text-white text-sm px-2 py-1 rounded">tidak ada</button>
                                </td>                                                              
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