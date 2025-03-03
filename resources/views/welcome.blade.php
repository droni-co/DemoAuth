@extends('layouts.app')

@section('content')
<div class="container mx-auto">
  <h1 class="text-2xl font-bold mt-8">Welcome</h1>
  <div class="mt-4">
    <p>Welcome to the Two Factor Authentication Demo!</p>
    <p>Click the button below to get started.</p>
    <a href="/dashboard" class="inline-block rounded bg-blue-500 text-white px-4 py-2 mt-4">Get Started</a>
  </div>

</div>
@endsection
