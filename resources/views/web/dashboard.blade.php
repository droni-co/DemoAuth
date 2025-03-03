@extends('layouts.app')

@section('content')
  <div class="container mx-auto">
    <h1 class="text-2xl font-bold mt-8">Dashboard</h1>
    <div class="mt-4">
    @if(isset($request) && $request->user())
    {{ $request->user()->twoFactorQrCodeSvg() }}
    @endif
      <p>Welcome, {{ Auth::user()->name }}!</p>
      @if(Auth::user()->two_factor_secret)
        <div class="shadow-lg rounded-lg p-4 bg-white mb-3">
        <p class="mt-4">Two factor authentication is enabled.</p>
          <form method="POST" action="{{ route('two-factor.disable') }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 mt-4">Disable Two Factor Authentication</button>
          </form>
        </div>
        <!-- <p>Recovery codes:</p>-->
        <div class="shadow-lg rounded-lg p-4 bg-white mb-3">
          <p class="mt-4 font-bold">Recovery codes:</p>
          <ul>
            @foreach (Auth::user()->recoveryCodes() as $code)
              <li>{{ $code }}</li>
            @endforeach
          </ul>
        </div>
        <!-- Configure Two Factor Authentication -->
        <div class="shadow-lg rounded-lg p-4 bg-white mb-3">
          <h2 class="text-xl font-bold">Configure Two Factor Authentication</h2>
          @if(Auth::user()->two_factor_confirmed_at)
            <p class="mt-2">Two factor authentication is configured at {{ Auth::user()->two_factor_confirmed_at }}.</p>
          @else
            <p class="mt-2">To enable two factor authentication, scan the following QR code with your phone's authenticator app.</p>
            <p class="mt-2">
              If you can't use a QR code, you can use the following code:
              <input type="text" value="{{ Auth::user()->two_factor_secret }}" readonly class="bg-gray-200 border-2 border-gray-300 rounded p-2 w-full mt-2">
            </p>
            {!! Auth::user()->twoFactorQrCodeSvg() !!}</p>
            <form method="POST" action="{{ route('two-factor.confirm') }}">
              @csrf
              <div class="mb-4">
                <label for="code" class="block text-gray-700 font-bold mb-2">Authentication Code:</label>
                <input type="text" id="code" name="code" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('code') border-red-500 @enderror" required>
                @error('code')
                  <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
              </div>
              <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4">Confirm</button>
            </form>
          @endif
        </div>

      @else
        <form method="POST" action="{{ route('two-factor.enable') }}">
          @csrf
          {{ Auth::user()->two_factor_secret }}
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4">Enable Two Factor Authentication</button>
        </form>
      @endif
    </div>
  </div>
@endsection
