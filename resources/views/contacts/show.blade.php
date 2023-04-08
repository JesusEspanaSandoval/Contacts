@extends('layouts.app')

@section('content')
  <div class="d-flex flex-column align-items-center justify-content-center position-absolute top-0 vw-100 vh-100"
    style="z-index: -1">
    <div class="d-flex justify-content-center align-items-center mx-auto mb-2"
      style="width: 10rem; height: 10rem; overflow: hidden; border-radius: 50%">
      <img src="/storage{{ $contact->picture }}" style="height: 100%" />
    </div>
    <h2 class="text-center">{{ $contact->name }}</h2>
    <h3 class="text-center">{{ $contact->phone_number }}</h3>
    <form class="ms-auto me-auto" method="post" action="{{ route('contacts.destroy', $contact->id) }}">
      @csrf
      @method('delete')

      <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary me-2">Edit</a>
      <input type="submit" value="Delete" class="btn btn-danger">
    </form>
  </div>
@endsection
