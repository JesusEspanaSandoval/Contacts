@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Create contact</div>

          <div class="card-body">
            <form method="POST" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
              @csrf

              <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone number</label>

                <div class="col-md-6">
                  <input id="phone_number" type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                    name="phone_number" required>

                  @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="picture" class="col-md-4 col-form-label text-md-end">Picture</label>

                <div class="col-md-6">
                  <input id="picture" type="file" class="form-control @error('picture') is-invalid @enderror"
                    name="picture" required>

                  @error('picture')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Create
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection