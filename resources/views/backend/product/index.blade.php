@extends('layouts.backend')
@section('title', 'All products')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class=" col-lg-12">
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
                <h4 class="text-center">Active Products</h4>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($activeProduct as $product)
                      <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                          <img src="{{ asset('storage/product/' . $product->photo) }}" width="80px" alt="">
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ Str::limit($product->description, 30, '...') }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                          <a href="{{ route('backend.product.edit', $product->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.product.status', $product->id) }}"
                            class=" btn {{ $product->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $product->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.product.trash', $product->id) }}"
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
                <h4 class="text-center">Draft products</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($draftProduct as $product)
                      <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                          <img src="{{ asset('storage/product/' . $product->photo) }}" width="80px" alt="">
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ Str::limit($product->description, 30, '...') }}</td>
                        <td>{{ $product->price }}</td>
                        <td>

                          <a href="{{ route('backend.product.edit', $product->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.product.status', $product->id) }}"
                            class=" btn {{ $product->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $product->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.product.trash', $product->id) }}"
                            class=" btn btn-sm btn-warning">Trash</a>


                          </form>
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
                <h4 class=" text-center">Trashed products</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($trashProduct as $product)
                      <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                          <img src="{{ asset('storage/product/' . $product->photo) }}" width="80px" alt="">
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ Str::limit($product->description, 30, '...') }}</td>
                        <td>{{ $product->price }}</td>
                        <td>

                          <a href="{{ route('backend.product.reStore', $product->id) }}"
                            class=" btn btn-sm btn-success">Restore</a>
                          <a href="{{ route('backend.product.delete', $product->id) }}"
                            class=" btn btn-sm btn-danger" onclick="return confirm('Are you Sure to Delete?')"> Delete </a>


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
    </div>
  </div>
@endsection