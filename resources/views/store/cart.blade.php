@extends('store.master')


@push('css')
    <style>
        .cart-div {
            margin: 50px;
        }


        .breadcrumb-nav {
            background-image: url('front_assets/Images/cart.jpg');
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
    <div class="bg-dark breadcrumb-nav">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Cart</h1>
                <div class="w-75 m-auto breadcrumb-custom"
                    style="--bs-breadcrumb-divider: '>'; --bs-breadcrumb-item-color: white; --bs-breadcrumb-active-color: white;"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb brdcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('home') }}"
                                class="text-decoration-none text-white">Home</a></li>
                        <li class="breadcrumb-item " aria-current="page">Cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="cart-div">
        <div class="row">
            <aside class="col-lg-9">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">Quantity</th>
                                    <th scope="col" width="120">Price</th>
                                    <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr>
                                        <td>
                                            <figure class="itemside align-items-center">
                                                <div class="aside">
                                                    <img src="{{ asset('Images/Products/' . $item->attributes->image->image_url) }}"
                                                        class="img-sm" width="100px" height="100px">
                                                </div>
                                                <figcaption class="info"> <a href="#"
                                                        class="title text-dark text-decoration-none"
                                                        data-abc="true">{{ $item->name }}</a>
                                                    <p class="text-muted small">SIZE:{{ $item->attributes->size }} <br>
                                                        Color: {{ $item->attributes->color }}</p>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <inpu class="form-control">
                                                <option>{{ $item->quantity }}</option>
                                            </inpu>
                                        </td>
                                        <td>
                                            <div class="price-wrap"> <var class="price">EGP {{ $item->price }}</var>
                                            </div>
                                        </td>
                                        <td class="text-right d-none d-md-block"> <a data-original-title="Save to Wishlist"
                                                title="" href="{{ route('wishlist-store') }}" class="btn btn-light"
                                                data-toggle="tooltip" data-abc="true"> <i class="fa fa-heart"></i></a> <a
                                                href="" class="btn btn-light" data-abc="true"> Remove</a> </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </aside>
            <aside class="col-lg-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <form>
                            <div class="form-group"> <label>Have coupon?</label>
                                <div class="input-group"> <input type="text" class="form-control coupon" name=""
                                        placeholder="Coupon code"> <span class="input-group-append"> <button
                                            class="btn btn-primary btn-apply coupon">Apply</button> </span> </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Total price:</dt>
                            <dd class="text-right ml-3">{{ Cart::getSubTotal() }}</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Discount:</dt>
                            <dd class="text-right text-danger ml-3"></dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Total:</dt>
                            <dd class="text-right text-dark b ml-3"><strong></strong></dd>
                        </dl>
                        <hr> <a href="#" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Make
                            Purchase </a> <a href="#" class="btn btn-out btn-success btn-square btn-main mt-2"
                            data-abc="true">Continue Shopping</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
