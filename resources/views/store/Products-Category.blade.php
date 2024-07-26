@extends('store.master')


@push('css')

<style>
    .cart-div {
        margin: 50px;
    }


    .breadcrumb-nav {
        background-image: url('../front_assets/Images/cart.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        height: 350px;
        margin-top: 0px;
        margin-bottom: 40px;
    }

    .brdcrumb {

        padding-left: 319px !important;
    }


    .breadcrumb-custom {
        --bs-breadcrumb-divider: '>';
        --bs-breadcrumb-item-color: white;
        --bs-breadcrumb-active-color: white;
        color: white;
        /* Fallback for browsers that don't support CSS variables */
    }
    </style>

@endpush


@section('content')

<div class="breadcrumb-nav">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">{{ $category->name }}</h1>
            <div class="w-75 m-auto breadcrumb-custom"
                style="--bs-breadcrumb-divider: '>'; --bs-breadcrumb-item-color: white; --bs-breadcrumb-active-color: white;"
                aria-label="breadcrumb">
                <ol class="breadcrumb brdcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('home') }}"
                            class="text-decoration-none text-white">Home</a></li>
                    <li class="breadcrumb-item " aria-current="page">{{ $category->name }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Section-->
<section class="container mb-5">



    <div class="row justify-content-between mt-5" id="products-container">
        @foreach ($products as $product)
            <div class="col-3 new-arrival">
                <div class="hover">
                    @php
                        $firstImage = $product->images->first();
                    @endphp
                    <a href="{{ route('product-details', $product->slug) }}">
                        <img src="{{ asset('Images/products/' . $firstImage->image_url) }}"
                            alt="{{ $product->name }}"></a>
                    <div class="product-icon">

                        <a href="#" class="icon addToWishlist"
                            data-product-id="{{ $product->id }}">
                            <span class="material-symbols-outlined">
                                favorite
                            </span>
                        </a>



                        <a href="#" class="icon">
                            <span class="material-symbols-outlined">
                                shopping_bag
                            </span>
                        </a>
                        <a href="#" class="icon">
                            <span class="material-symbols-outlined">
                                visibility
                            </span>
                        </a>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('product-details', $product->slug) }}"
                        class="text-decoration-none">
                        <p class="text-center text-dark fw-bold product-name">{{ $product->name }}</p>
                    </a>
                    <div>
                        <p class="product-price">EGP {{ $product->price }}</p>
                    </div>

                </div>

            </div>
        @endforeach
    </div>

</section>

@endsection
