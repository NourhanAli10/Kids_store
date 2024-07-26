@extends('store.master')

@section('title', 'shop')


@push('css')
    <style>
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

        /* .product-single-card:hover {
                -webkit-box-shadow: 1px 1px 28.5px -7px #d6d6d6;
                -moz-box-shadow: 1px 1px 28.5px -7px #d6d6d6;
                box-shadow: 1px 1px 28.5px -7px #d6d6d6;
            } */

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

        /* .product-single-card .product-top-area .product-img .hover-view {
                opacity: 0;
                transition: 0.5s ease-in;
            } */

        /* .product-single-card .product-top-area:hover .product-img .first-view {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .product-single-card .product-top-area:hover .product-img .hover-view {
                opacity: 100%;
                scale: 1.2;
            } */

        .product-single-card .product-top-area .sideicons {
            position: absolute;
            right: 15px;
            display: grid;
            gap: 10px;
        }

        .product-single-card .product-top-area .sideicons .sideicons-btn {
            background-color: #ee6394 !important;
            color: #fff !important;
            padding: 1px 15px !important;

            text-align: center !important;
            border-radius: 50% !important;
            border: none !important;
            width: 15px !important;
            height: 35px !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center ;
            opacity: 0 ;
            visibility: hidden ;
            transform: translateX(60px) ;
            transition: 0.3s ease-in ;
            -webkit-box-shadow: 1px 1px 28.5px -7px #dddddd ;
            -moz-box-shadow: 1px 1px 28.5px -7px #dddddd ;
            box-shadow: 1px 1px 28.5px -7px #dddddd ;
        }

        .product-single-card .product-top-area .sideicons .sideicons-btn:hover {
            color: #fff !important;
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

<div class=" bg-dark breadcrumb-nav">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop</h1>
            <div class="w-75 m-auto breadcrumb-custom"
                style="--bs-breadcrumb-divider: '>'; --bs-breadcrumb-item-color: white; --bs-breadcrumb-active-color: white;"
                aria-label="breadcrumb">
                <ol class="breadcrumb brdcrumb">
                    <li class="breadcrumb-item "><a href="{{ route('home') }}"
                            class="text-decoration-none text-white">Home</a></li>
                    <li class="breadcrumb-item " aria-current="page">Shop</li>
                </ol>
            </div>
        </div>
    </div>
</div>

    <!-- Product Section - Start -->
    <section class="container">



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

    <div class="toast-container  p-3">
        <div id="toast" class="toast align-items-center text-dark bg-secondary border-1 w-100 fade" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex justify-content-center align-items-center">
                <div class="toast-body">
                    <!-- Message will be inserted here -->
                </div>
                <button type="button" class="btn-close " data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>


    <!-- Product Section - End -->

@endsection


@push('js')


<script>
    $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $('.addToWishlist').on('click', function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'post',
                        url: "{{ route('wishlist-store') }}",
                        data: {
                            'productId': $(this).attr('data-product-id'),
                        },
                        success: function(data) {
                            $('#toast .toast-body').text(data.msg);
                            var toastEl = document.getElementById('toast');
                            var toast = new bootstrap.Toast(toastEl);
                            toast.show();

                        },
                    });

                });
            });

</script>

@endpush
