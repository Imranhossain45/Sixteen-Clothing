@extends('layouts.frontend')
@section('content')
  <!-- Page Content -->
  <div class="page-heading products-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>new arrivals</h4>
            <h2>sixteen products</h2>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="filters">
            <ul>
              <li class="active" data-filter="*">All Products</li>
              {{-- <li>
                <select name="" id="">
                  <option selected disabled>Select Category</option>
                  @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
              </select>
              </li> --}}
              {{-- <li data-filter=".sharee">Sharee</li>
              <li data-filter=".dev">Flash Deals</li>
              <li data-filter=".gra">Last Minute</li> --}}
            </ul>
          </div>
        </div>
        <div class="col-md-12">
          <div class="filters-content">
            <div class="row grid">
              @foreach ($activeProduct as $product)
                <div class="col-lg-4 col-md-4 all">
                  <div class="product-item">
                    <a href="#"><img src="{{ url('storage/product/' . $product->photo) }}" width="50"
                        height="200" alt="">
                      <h6 class="text-danger">${{ $product->price }}</h6>
                    </a>
                    <div class="down-content">
                      <a href="#">
                        <h4>{{ $product->title }}</h4>
                      </a>
                      <p>{{ $product->description }}</p>
                      <ul class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                      <span>Reviews (12)</span>
                    </div>
                  </div>
                </div>
              @endforeach


              {{-- <div class="col-lg-4 col-md-4 all des">
                <div class="product-item">
                  <a href="#"><img src="" alt=""></a>
                  <div class="down-content">
                    <a href="#">
                      <h4>Tittle goes here</h4>
                    </a>
                    <h6>$32.50</h6>
                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                    <ul class="stars">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>Reviews (36)</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 all gra">
                <div class="product-item">
                  <a href="#"><img src="assets/images/product_04.jpg" alt=""></a>
                  <div class="down-content">
                    <a href="#">
                      <h4>Tittle goes here</h4>
                    </a>
                    <h6>$24.60</h6>
                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                    <ul class="stars">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>Reviews (48)</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 all dev">
                <div class="product-item">
                  <a href="#"><img src="assets/images/product_05.jpg" alt=""></a>
                  <div class="down-content">
                    <a href="#">
                      <h4>Tittle goes here</h4>
                    </a>
                    <h6>$18.75</h6>
                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                    <ul class="stars">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>Reviews (60)</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 all des">
                <div class="product-item">
                  <a href="#"><img src="assets/images/product_06.jpg" alt=""></a>
                  <div class="down-content">
                    <a href="#">
                      <h4>Tittle goes here</h4>
                    </a>
                    <h6>$12.50</h6>
                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
                    <ul class="stars">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>Reviews (72)</span>
                  </div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <ul class="pages">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
