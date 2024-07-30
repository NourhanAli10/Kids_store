@extends('store.master')


@push('css')
    <style>
        .section-cart {
            margin-top: 150px;
            margin-bottom: 150px;
        }

        .icon-hover-primary:hover {
            border-color: #3b71ca !important;
            background-color: white !important;
        }

        .icon-hover-primary:hover i {
            color: #3b71ca !important;
        }

        .icon-hover-danger:hover {
            border-color: #dc4c64 !important;
            background-color: white !important;
        }

        .icon-hover-danger:hover i {
            color: #dc4c64 !important;
        }
    </style>
@endpush

@section('content')
    <section class="section-cart">
        <div class="container">
            <div class="row">
                <!-- cart -->
                <div class="col-lg-12">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Your shopping cart</h4>
                            @foreach ($cart as $item)
                                <div class="row gy-3 mb-4">
                                    <div class="col-lg-6">
                                        <div class="me-lg-6">
                                            <div class="d-flex">
                                                <img src="{{ asset('Images/Products/' . $item->attributes->image->image_url) }}"
                                                    class="border rounded me-3" style="width: 96px; height: 96px;" />
                                                <div class="">
                                                    <a href="#" class="nav-link">{{ $item->name }}</a>
                                                    <p class="text-muted">Size:{{ $item->attributes->size }} <br>
                                                        Color: {{ $item->attributes->color }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                        <div class="">
                                            <select style="width: 100px;" class="form-select me-4">
                                                <option>{{ $item->quantity }}</option>

                                            </select>
                                        </div>
                                        <div class="">
                                            <text class="h6">EGP {{ $item->quantity * $item->price }}</text> <br />
                                            <small class="text-muted text-nowrap"> EGP {{ $item->price }}/ per item </small>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                        <div class="float-md-end">
                                            <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i
                                                    class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                                            <a href="#" class="btn btn-light border text-danger icon-hover-danger">
                                                Remove</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="border-top pt-4 mx-4 mb-4">
                            <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                            <p class="text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut
                                aliquip
                            </p>
                        </div>
                    </div>
                </div>
                <!-- cart -->
                <!-- summary -->

                <!-- summary -->
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card mb-3 border shadow-0">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label class="form-label">Have coupon?</label>
                                <div class="input-group">
                                    <input type="text" class="form-control border" name=""
                                        placeholder="Coupon code" />
                                    <button class="btn btn-light border">Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card shadow-0 border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Total price:</p>
                            <p class="mb-2">$329.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Discount:</p>
                            <p class="mb-2 text-success">-$60.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">TAX:</p>
                            <p class="mb-2">$14.00</p>
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Total price:</p>
                            <p class="mb-2 fw-bold">$283.00</p>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('checkout') }}" class="btn custom_btn w-100 shadow-0 mb-2"> Make Purchase </a>
                            <a href="{{ route('show-all-products') }}" class="btn btn-light w-100 border-rounded mt-2"> Back to shop </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('js')
@endpush
