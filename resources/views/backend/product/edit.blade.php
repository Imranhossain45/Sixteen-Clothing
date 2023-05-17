@extends('layouts.backend')
@section('title', 'Edit product')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
          </ol>
        </nav>
        <h1 class="m-0">Products</h1>
      </div>
    </div>
  </div>
  <section>
    <div class="container-fluid" >
      <div class="row justify-content-center" >
        <div class="col-lg-8" >
          <div class="card" >
            <div class="card-header">
              <h1 class="text-center text-white p-3">Edit Product</h1>
            </div>
            <div class="card-body">
              <form action="{{ route('backend.product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" form-group">
                  <b>Title:</b>
                  <input type="text" name="title" class=" form-control " placeholder="Enter Product Title" value="{{ $product->title }}">
                </div>
                <div class="form-group">
                  <select name="category" class="form-control">
                    <option selected disabled>Select Category</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class=" form-group">
                  <b>Price:</b>
                  <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                </div>
                <div class=" form-group">
                  <b>Product Description:</b>
                  <textarea name="description" class="form-control" rows="7">{{ $product->description }}</textarea>
                </div>
                <div class=" form-group">
                  <b>Photo:</b>
                  <input type="file" name="photo" class="form-control" required>
                  <img src="{{ asset('storage/product/' . $product->photo) }}" width="60" alt="image">
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
