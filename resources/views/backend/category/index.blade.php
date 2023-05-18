@extends('layouts.backend')
@section('title','Category')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            {{-- <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Category</li>
          </ol>
        </nav>
        <h1 class="m-0">Category</h1>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <!-- Nav tabs -->
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

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="active">
            <div class="card">
              <div class="card-header">
                <h4 class=" text-center">Active Category</h4>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table">

                    @foreach ($activeCategories as $category)
                      <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->status }}</td>
                        <td>

                          <a href="{{ route('backend.category.edit', $category->id) }}"
                            class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.category.status', $category->id) }}"
                            class=" btn {{ $category->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $category->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.category.trash', $category->id) }}"
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
                <h4 class=" text-center">Draft Category</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($draftCategories as $category)
                      <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->status }}</td>
                        <td>

                          <a href="{{ route('backend.category.edit', $category->id) }}"
                            class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.category.status', $category->id) }}"
                            class=" btn {{ $category->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $category->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.category.trash', $category->id) }}"
                            class=" btn btn-sm btn-warning">Trash</a>
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
                <h4 class="text-center">Trashed Categories</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($trashCategories as $category)
                      <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->status }}</td>
                        <td>
                          <a href="{{ route('backend.category.reStore', $category->id) }}"
                            class=" btn btn-sm btn-success">Restore</a>
                          <form action="{{ route('backend.category.permDelete', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class=" btn btn-sm btn-danger p_delete "
                              onclick="return confirm('Are you Sure to Delete?')">Delete</button>
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
            <h4>Add Category</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('backend.category.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="text" class="form-control mb-3" name="name" placeholder="Name"
                value="{{ old('name') }}">
              <button type="submit" class=" btn btn-sm btn-primary my-3">Add+</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection
