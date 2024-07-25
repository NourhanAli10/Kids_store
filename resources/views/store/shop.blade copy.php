@extends('store.master')

@section('title', 'shop')


@push('css')
    <style>


section {
    margin-top: 150px;
}
.user-select-none {
  user-select: none;
}
a {
  text-decoration: none;
  color: unset;
}

.review-star {
  color: #fdcc0d;
  font-size: 13px;
}
/* ===========
Product Single Card - Start
============= */
.product-single-card {
  padding: 20px;
  border-radius: 5px;
  box-shadow: 1px 1px 15px #cccccc40;
  transition: 0.5s ease-in;
  /* background-color: red; */
}

.product-single-card:hover {
  -webkit-box-shadow: 1px 1px 28.5px -7px #d6d6d6;
  -moz-box-shadow: 1px 1px 28.5px -7px #d6d6d6;
  box-shadow: 1px 1px 28.5px -7px #d6d6d6;
}

.product-single-card .product-info {
  padding: 15px 0 0 0;
}

.product-single-card .product-top-area {
  position: relative;
  display: flex;
  align-items: center;
  overflow: hidden;
  border-radius: 5px;
}

.product-single-card .product-top-area .product-discount {
  position: absolute;
  top: 10px;
  left: 10px;
  background: white;
  border-radius: 3px;
  padding: 5px 10px;
  box-shadow: 1px 1px 28.5px -7px #dddddd;
  user-select: none;
  z-index: 999;
}

.product-single-card .product-top-area .product-img {
  aspect-ratio: 1/1;
  overflow: hidden;
}

.product-single-card .product-top-area .product-img .first-view {
  transition: 0.5s ease-in;
}

.product-single-card .product-top-area .product-img .hover-view {
  opacity: 0;
  transition: 0.5s ease-in;
}

.product-single-card .product-top-area:hover .product-img .first-view {
  opacity: 0;
  width: 0;
  height: 0;
}
.product-single-card .product-top-area:hover .product-img .hover-view {
  opacity: 100%;
  scale: 1.2;
}

.product-single-card .product-top-area .sideicons {
  position: absolute;
  right: 15px;
  display: grid;
  gap: 10px;
}

.product-single-card .product-top-area .sideicons .sideicons-btn {
  background-color: #fff;
  color: #000;
  border-radius: 50%;
  border: none;
  width: 35px;
  height: 35px;
  display: flex;
  justify-content: center;
  align-items: center;
  opacity: 0;
  visibility: hidden;
  transform: translateX(60px);
  transition: 0.3s ease-in;
  -webkit-box-shadow: 1px 1px 28.5px -7px #dddddd;
  -moz-box-shadow: 1px 1px 28.5px -7px #dddddd;
  box-shadow: 1px 1px 28.5px -7px #dddddd;
}

.product-single-card .product-top-area .sideicons .sideicons-btn:hover {
  color: #fff;
  background-color: #000;
}

.product-single-card .product-top-area .sideicons .sideicons-btn:nth-child(1) {
  transition-delay: 100ms;
}

.product-single-card .product-top-area .sideicons .sideicons-btn:nth-child(2) {
  transition-delay: 200ms;
}

.product-single-card .product-top-area .sideicons .sideicons-btn:nth-child(3) {
  transition-delay: 300ms;
}

.product-single-card .product-top-area .sideicons .sideicons-btn:nth-child(4) {
  transition-delay: 400ms;
}

.product-single-card .product-top-area:hover .sideicons .sideicons-btn {
  opacity: 100%;
  visibility: visible;
  transform: translateX(0);
}

.product-single-card .product-info .product-category {
  font-weight: 600;
  opacity: 60%;
}

.product-single-card .product-info .product-title {
  font-size: 16px;
  font-weight: 600;
}

.product-single-card .product-info .old-price,
.product-single-card .product-info .new-price {
  padding-right: 15px;
  font-size: 18px;
  font-weight: 600;
  letter-spacing: 1px;
}
.product-single-card .product-info .old-price {
  text-decoration: line-through;
  opacity: 70%;
}
/* ===========
Product Single Card - End
============= */

    </style>
@endpush
@section('content')

<!-- Product Section - Start -->
<section>
    <div class="container">
      <div class="row g-4 py-5">
        @foreach($products as $product)
        <div class="col-md-3">
          <div class="product-single-card">
            <div class="product-top-area">
              <div class="product-discount">
                $55.00
              </div>

              <div class="product-img">
                <div class="first-view">
                  <img src="{{ asset('/Images/products/' .$product->images->first()->image_url) }}" alt="logo" class="img-fluid"
                  width="300px" height="300px">
                </div>
                {{-- <div class="hover-view">
                  <img src="./assets/img/placeholder/dummy.jpg" alt="logo" class="img-fluid">
                </div> --}}
              </div>
              <div class="sideicons">
                <button class="sideicons-btn">
                  <i class="fa-solid fa-cart-plus"></i>
                </button>
                <button class="sideicons-btn">
                  <i class="fa-solid fa-eye"></i>
                </button>
                <button class="sideicons-btn">
                  <i class="fa-solid fa-heart"></i>
                </button>
                <button class="sideicons-btn">
                  <i class="fa-solid fa-shuffle"></i>
                </button>
              </div>
            </div>
            <div class="product-info">
              <h6 class="product-category"><a href="#"> <span class="text-primary">Category : </span>{{ $product->category->name }}</a></h6>
              <h6 class="product-title text-truncate"><a href="#">{{ $product->name }}</a></h6>
              <div class="d-flex align-items-center">
                <div class="review-star me-1">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-regular fa-star-half-stroke"></i>
                  <i class="fa-regular fa-star"></i>
                </div>

                <span class="review-count">(13)</span>
              </div>
              <div class="d-flex flex-wrap align-items-center py-2">
                {{-- <div class="old-price">
                    {{ $product->price }}
                </div> --}}
                <div class="new-price">
                    {{ $product->price }} EGP
                </div>

              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Product Section - End -->

@endsection
