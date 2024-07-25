@extends('store.master')

@section('title', 'all products')

@section('content')



    <div class="row">
        <div class="row justify-content-between mt-5">
            @foreach ($products as $product)
                <div class="col-3 new-arrival">
                    <div class="hover">
                        <a href="#"><img src="{{ asset('front_assets/Images//Children-clothing.jpg') }}"></a>
                        <div class="product-icon">
                            <a href="#" class="icon">
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
                        <a href="#" class="text-decoration-none">
                            <p class="text-center text-dark fw-bold"> {{ $product->name }}</p>
                        </a>
                        <div>
                            <p> EGP {{ $product->price }}</p>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>
    </div>

    <div class="pt-5 d-block m-auto text-center">
        <button class="btn btn-primary btn-lg">Show All</button>
    </div>


@endsection


