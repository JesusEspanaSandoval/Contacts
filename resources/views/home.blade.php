@extends('layouts.app')

@section('content')
  @if (count($contacts) != 0)
    <h2 class="text-center">Your last contacts</h2>
    <div class="d-flex flex-wrap justify-content-center">
      @foreach ($contacts as $contact)
        <div class="card mx-2 my-2" style="width: 15rem">
          <div class="card-header">{{ $contact->name }}</div>
          <div class="d-flex flex-column justify-content-center card-body">
            <div class="d-flex justify-content-center align-items-center mx-auto mb-2"
              style="width: 5rem; height: 5rem; overflow: hidden; border-radius: 50%">
              <img src="/storage{{ $contact->picture }}" style="height: 100%" />
            </div>
            <h3 class="text-center">{{ $contact->phone_number }}</h3>
            <form class="ms-auto me-auto" method="post" action="{{ route('contacts.destroy', $contact->id) }}">
              @csrf
              @method('delete')

              <a class="btn btn-primary me-2">Edit</a>
              <input type="submit" value="Delete" class="btn btn-danger">
            </form>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="card mx-auto" style="min-width: 20rem; max-width: 30rem">
      <div class="d-flex flex-column justify-content-center card-body">
        <h3 class="text-center">You don't have contacts</h3>
        <div class="mx-auto">
          <a href="{{ route('contacts.create') }}" class="btn btn-primary me-2">Add one</a>
        </div>
      </div>
    </div>
  @endif
@endsection
