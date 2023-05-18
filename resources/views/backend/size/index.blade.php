@extends('layouts.backend')
@section('title', 'All Sizes')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Size</li>
          </ol>
        </nav>
        <h1 class="m-0">All Size</h1>
      </div>
    </div>
  </div>
  <section>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          {{-- nab tabs --}}
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" data-toggle="tab" data-target="#active"><b>Active</b></button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" data-toggle="tab" data-target="#draft"><b>Draft</b></button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" data-toggle="tab" data-target="#trash"><b>Trash</b></button>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="active">
              <div class="card">
                <div class="card-header">
                  <h4 class="text-center">Active Size</h4>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($activeSize as $size)
                        <tr>
                          <td>{{ $size->id }}</td>
                          <td>{{ $size->name }}</td>
                          <td>{{ $size->slug }}</td>
                          <td>{{ $size->status }}</td>
                          <td>
                            <a href="{{ route('backend.size.edit', $size->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{ route('backend.size.status', $size->id) }}"
                              class="btn {{ $size->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $size->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                            <a href="{{ route('backend.size.trash', $size->id) }}" class="btn btn-sm btn-warning">Trash</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="draft">
              <div class="card">
                <div class="card-header">
                  <h4 class="text-center">Draft Size</h4>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($draftSize as $size)
                        <tr>
                          <td>{{ $size->id }}</td>
                          <td>{{ $size->name }}</td>
                          <td>{{ $size->slug }}</td>
                          <td>{{ $size->status }}</td>
                          <td>
                            <a href="{{ route('backend.size.edit', $size->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{ route('backend.size.status', $size->id) }}"
                              class="btn {{ $size->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $size->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                            <a href="{{ route('backend.size.trash', $size->id) }}"
                              class="btn btn-sm btn-warning">Trash</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="trash">
              <div class="card">
                <div class="card-header">
                  <h4 class="text-center">Trashed Size</h4>
                </div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($trashSize as $size)
                        <tr>
                          <td>{{ $size->id }}</td>
                          <td>{{ $size->name }}</td>
                          <td>{{ $size->slug }}</td>
                          <td>{{ $size->status }}</td>
                          <td>
                            <a href="{{ route('backend.size.reStore', $size->id) }}"
                              class="btn btn-sm btn-success">Restore</a>
                            <form action="{{ route('backend.size.permDelete', $size->id) }}" method="POST">
                              @csrf
                              @method('DELETE')

                              <button type="button" name="submit" class="btn tbn-sm btn-danger p_delete"
                                onclick="return confirm('Are you sure to Delete?')">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center">Add Size</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('backend.size.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <button type="submit" name="submit" class="btn btn-primary mt-3">Add+</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
