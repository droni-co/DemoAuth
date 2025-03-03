@extends('layouts.app')

@section('content')

<div class="container mx-auto">
  <div class="bg-white p-8 rounded shadow-md w-96 mx-auto my-10">
    <h2 class="text-2xl font-bold mb-6">Iniciar sesión</h2>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="mb-4">
        <label for="name" class="block text-gray-700 font-bold mb-2">Nombre completo:</label>
        <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
          <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-bold mb-2">Correo electrónico:</label>
        <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
          <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña:</label>
        <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" placeholder="Introduce tu contraseña" required>
        @error('password')
          <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirmar contraseña:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" placeholder="Confirma tu contraseña" required>
        @error('password_confirmation')
        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Iniciar sesión
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
