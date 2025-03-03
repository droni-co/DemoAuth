@extends('layouts.app')

@section('content')
<div class="container mx-auto">
  <div class="bg-white p-8 rounded shadow-md w-96 mx-auto my-10">
    <h2 class="text-2xl font-bold mb-6">Confirmar contraseña</h2>
    <form method="POST" action="{{ route('password.confirm') }}">
      @csrf
      <div class="mb-4">
        <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña:</label>
        <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" placeholder="Introduce tu contraseña" required>
        @error('password')
          <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
      </div>
      <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Confirmar contraseña
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
