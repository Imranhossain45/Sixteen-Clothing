@extends('layouts.backend')
@section('title', 'Product Color')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-level="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" area-current="page">Product Color</li>
          </ol>
        </nav>
        <h1 class="m-0">Product Color</h1>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        
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
                <h4 class="text-center">Active Color</h4>
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
                    @foreach ($activeColor as $color)
                      <tr>
                        <td>{{ $color->id }}</td>
                        <td>{{ $color->name }}</td>
                        <td>{{ $color->slug }}</td>
                        <td>{{ $color->status }}</td>
                        <td>
                          <a href="{{ route('backend.color.edit', $color->id) }}" class="btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.color.status', $color->id) }}"
                            class="btn {{ $color->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $color->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.color.trash', $color->id) }}"
                            class=" btn btn-sm btn-warning">Trash</a>
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
                <h4 class="text-center">Draft Color</h4>
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
                    @foreach ($draftColor as $color)
                      <tr>
                        <td>{{ $color->id }}</td>
                        <td>{{ $color->name }}</td>
                        <td>{{ $color->slug }}</td>
                        <td>{{ $color->status }}</td>
                        <td>
                          <a href="{{ route('backend.color.edit', $color->id) }}" class="btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.color.status', $color->id) }}"
                            class="btn {{ $color->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $color->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.color.trash', $color->id) }}"
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
                <h4 class="text-center">Trashed Color</h4>
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
                    @foreach ($trashColor as $color)
                      <tr>
                        <td>{{ $color->id }}</td>
                        <td>{{ $color->name }}</td>
                        <td>{{ $color->slug }}</td>
                        <td>
                          <a href="{{ route('backend.color.reStore', $color->id) }}"
                            class="btn btn-sm btn-success">Restore</a>
                          <form action="{{ route('backend.color.permDelete', $color->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" name="submit" class="btn btn-sm btn-danger p_delete"
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
            <h4>Add Color</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('backend.color.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name">
              </div>
              <button type="submit" name="submit" class="btn btn-sm btn-primary">Add+</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
@endsection
