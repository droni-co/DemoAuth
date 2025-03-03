<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Droni.co</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
  </head>

  <body>
    <nav class="bg-gray-800 text-white p-4">
      <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-2xl font-bold">Droni.co</a>
        <ul class="flex space-x-4">
          @if(Auth::check())
            <li>{{ Auth::user()->name }}</li>
            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
              </form>
            </li>
          @else
            <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
            <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
          @endif
        </ul>
      </div>
    </nav>
    @if (session('status') == 'two-factor-authentication-enabled')
      <div class="mb-4 font-medium text-sm">
        Please finish configuring two factor authentication below.
      </div>
    @endif
    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
      A new email verification link has been emailed to you!
    </div>
    @endif

    @yield('content')
  </body>
</html>
