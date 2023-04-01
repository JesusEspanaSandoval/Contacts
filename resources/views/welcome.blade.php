@extends('layouts.app')

@section('content')
  <main class='d-flex flex-column justify-content-center align-items-center position-absolute top-0 vw-100 vh-100'
    style='z-index: -1'>
    <h1>Hi👋, welcome to my task app</h1>
    <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Get started</a>
  </main>
@endsection
