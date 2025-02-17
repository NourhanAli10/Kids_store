@extends('store.master')


@section('title', 'My Wishlist')

@push('css')
    <style>
        .cart-wrap {
            padding: 40px 0;
            font-family: 'Open Sans', sans-serif;
            margin: 100px;
        }

        .main-heading {
            font-size: 19px;
            margin-bottom: 20px;
        }

        .table-wishlist table {
            width: 100%;
        }

        .table-wishlist thead {
            border-bottom: 1px solid #e5e5e5;
            margin-bottom: 5px;
        }

        .table-wishlist thead tr th {
            padding: 8px 0 18px;
            color: #484848;
            font-size: 15px;
            font-weight: 400;
        }

        .table-wishlist tr td {
            padding: 25px 0;
            vertical-align: middle;
        }

        .table-wishlist tr td .img-product {
            width: 72px;
            float: left;
            margin-left: 8px;
            margin-right: 31px;
            line-height: 63px;
        }

        .table-wishlist tr td .img-product img {
            width: 100%;
        }

        .table-wishlist tr td .name-product {
            font-size: 15px;
            color: #484848;
            padding-top: 8px;
            line-height: 24px;
            width: 50%;
        }

        .table-wishlist tr td.price {
            font-weight: 600;
        }

        .table-wishlist tr td .quanlity {
            position: relative;
        }

        .total {
            font-size: 24px;
            font-weight: 600;
            color: #8660e9;
        }

        .display-flex {
            display: flex;
        }

        .align-center {
            align-items: center;
        }

        .round-black-btn {
            border-radius: 25px;
            background: #212529;
            color: #fff;
            padding: 5px 20px;
            display: inline-block;
            border: solid 2px #212529;
            transition: all 0.5s ease-in-out 0s;
            cursor: pointer;
            font-size: 14px;
        }

        .round-black-btn:hover,
        .round-black-btn:focus {
            background: transparent;
            color: #212529;
            text-decoration: none;
        }

        .mb-10 {
            margin-bottom: 10px !important;
        }

        .mt-30 {
            margin-top: 30px !important;
        }

        .d-block {
            display: block;
        }

        .custom-form label {
            font-size: 14px;
            line-height: 14px;
        }

        .pretty.p-default {
            margin-bottom: 15px;
        }

        .pretty input:checked~.state.p-primary-o label:before,
        .pretty.p-toggle .state.p-primary-o label:before {
            border-color: #8660e9;
        }

        .pretty.p-default:not(.p-fill) input:checked~.state.p-primary-o label:after {
            background-color: #8660e9 !important;
        }

        .main-heading.border-b {
            border-bottom: solid 1px #ededed;
            padding-bottom: 15px;
            margin-bottom: 20px !important;
        }

        .custom-form .pretty .state label {
            padding-left: 6px;
        }

        .custom-form .pretty .state label:before {
            top: 1px;
        }

        .custom-form .pretty .state label:after {
            top: 1px;
        }

        .custom-form .form-control {
            font-size: 14px;
            height: 38px;
        }

        .custom-form .form-control:focus {
            box-shadow: none;
        }

        .custom-form textarea.form-control {
            height: auto;
        }

        .mt-40 {
            margin-top: 40px !important;
        }

        .in-stock-box {
            background: #ff0000;
            font-size: 12px;
            text-align: center;
            border-radius: 25px;
            padding: 4px 15px;
            display: inline-block;
            color: #fff;
        }

        .trash-icon {
            font-size: 20px;
            color: #212529;
        }
    </style>
@endpush
@section('content')
    <div class="cart-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-heading mb-10">My wishlist</div>
                    <div class="table-wishlist">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="45%">Product Name</th>
                                    <th width="15%">Unit Price</th>
                                    <th width="15%">Stock Status</th>
                                    <th width="15%"></th>
                                    <th width="10%"></th>
                                </tr>

                            </thead>
                            <tbody>
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                        <tr>
                                            <td width="45%">
                                                <div class="display-flex align-center">
                                                    <div class="img-product">
                                                        <img src="{{ asset('Images/products/' . $product->images->first()->image_url) }}"
                                                            alt="" class="mCS_img_loaded" width="150px"
                                                            height="100px">
                                                    </div>
                                                    <div class="name-product">
                                                        {{ $product->name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="15%" class="price">{{ $product->price }} EGP</td>
                                            <td width="15%"><span class="in-stock-box">
                                                    @php
                                                        echo $product->quantity > 0 ? 'In Stock' : 'Out of Stock';
                                                    @endphp

                                                </span></td>
                                            {{-- <td width="15%">
                                                <button class="round-black-btn small-btn">Add to Cart</button>
                                            </td> --}}
                                            <td width="10%" class="text-center"><a href="#"
                                                    class="trash-icon removeFromWishlist"
                                                    data-product-id={{ $product->id }}><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                            </tbody>
                            @else
                                <div class="text-center">
                                    <h3>No products found</h3>
                                </div>
                                @endif

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('js')
    <script>
        $(document).ready(function() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.removeFromWishlist').on('click', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'delete',
                    url: "{{ route('wishlist-delete') }}",
                    data: {
                        'productId': $(this).attr('data-product-id'),
                    },
                    success: function(data) {
                        location.reload();

                    },
                });

            });

        });
    </script>
@endpush
