@extends('layouts.app')

@section('content')
  @if (count($contacts) != 0)
    <div class="d-flex flex-col flex-wrap">
      @foreach ($contacts as $contact)
        <div
          class="d-flex flex-md-row flex-column align-items-center justify-content-md-between border-top border-bottom border-dark p-2 vw-100">
          <h3 class="my-auto ms=md-4 text-center">{{ $contact->name }} <br class="d-md-none" /> {{ $contact->phone_number }}
          </h3>
          <form class="me-md-4" method="post" action="{{ route('contacts.destroy', $contact->id) }}">
            @csrf
            @method('delete')

            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary me-2">Edit</a>
            <input type="submit" value="Delete" class="btn btn-danger">
          </form>
        </div>
      @endforeach
    </div>
  @else
    <div class="card mx-auto" style="min-width: 15rem; max-width: 30rem">
      <div class="d-flex flex-column justify-content-center card-body">
        <h3 class="text-center">You don't have contacts</h3>
        <div class="mx-auto">
          <a href="{{ route('contacts.create') }}" class="btn btn-primary me-2">Add one</a>
        </div>
      </div>
    </div>
  @endif
@endsection
