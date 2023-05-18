@extends('layouts.backend')
@section('title','Edit Color')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Color</li>
          </ol>
        </nav>
        <h1 class="m-0">Edit Color</h1>
      </div>
    </div>
  </div>
  <section>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header">
              <h3>Edit Color</h3>
            </div>
            <div class="card-body">
              <form action="{{ route('backend.color.update', $color->id) }}" method="POST">
                @csrf
                <div class="form-group">
                  <b>Name:</b>
                  <input type="text" name="name" class="form-control" value="{{ $color->name }}">
                </div>
                <button type="submit" name="submit" class="btn btn-primary mt-3">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
