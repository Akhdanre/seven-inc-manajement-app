<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login E-Data</title>
  @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center h-screen bg-gray-900">
  <div class="w-full max-w-xs">
    <div class="mb-6">
      <h1 class="text-3xl text-white text-center mb-4">Sistem Manajemen Mahasiswa</h1>
    </div>
    <form class="bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('actionLogin')}}">
      @csrf
      <div class="mb-4">
        <h2 class="text-2xl text-black pb-6 text-center">Silahkan Masuk</h2>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
          Email
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" placeholder="email@gmail.com">
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Password
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="******************">
      </div>
      <div class="mb-6">
        <button class="bg-blue-500 w-full rounded hover:bg-blue-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type="submit">
          Masuk
        </button>
      </div>
      @if($errors->any())
      <div>
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
      </div>
      @endif
    </form>
    <p class="text-center text-white text-xs">
      &copy;2024. All rights reserved.
    </p>
  </div>
</body>

</html>