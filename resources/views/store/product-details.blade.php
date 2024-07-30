@extends('store.master')


@push('css')
    <style>
        .animated {
            -webkit-transition: height 0.2s;
            -moz-transition: height 0.2s;
            transition: height 0.2s;
        }

        .stars {
            margin: 20px 0;
            font-size: 24px;
            color: #d17581;
        }
    </style>
@endpush


@section('content')
    <div class="container pr-details">
        <div class="row details-snippet1">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-2 mini-preview">

                        @foreach ($product->images as $image)
                            <img class="img-fluid" src="{{ asset('/Images/products/' . $image->image_url) }}"
                                alt="{{ $product->name }}">
                        @endforeach
                    </div>
                    <div class="col-md-10">
                        <div class="product-image">
                            @php
                                $firstImage = $product->images->first();
                            @endphp
                            <img class="" src="{{ asset('/Images/products/' . $firstImage->image_url) }}"
                                alt="{{ $product->name }}" width="530px" height="530px">
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-5">
                @if (session('message'))
                    <div id="flash-message" class="alert alert-success w-75">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="category"><span class="theme-text">Category:</span> {{ $product->category->name }}</div>
                <div class="title">{{ $product->name }}</div>
                <div class="ratings my-2">
                    <div class="stars d-flex">
                        <div class="theme-text mr-2">Product Ratings: </div>
                        <div>&#9733;</div>
                        <div>&#9733;</div>
                        <div>&#9733;</div>
                        <div>&#9733;</div>
                        <div>&#9733;</div>
                        <div class="ml-2">(4.5) 50 Reviews</div>
                    </div>
                </div>
                <div class="price my-2">EGP{{ $product->price }}
                    {{-- <strike class="original-price">
                    </strike> --}}
                </div>
                <div class="theme-text subtitle">Brief Description:</div>
                <div class="brief-description">
                    {{ $product->description }}
                </div>

                <form action="{{ route('cart.add') }}" method="post">
                    @csrf
                    <!-- TO REMOVE COLORS -->
                    <div>
                        <div class="subtitle my-3 theme-text">Colors:</div>
                        <div class="select-colors d-flex">
                            <div>
                                <select class="form-control" name="color_id">
                                    <option> Select Color</option>
                                    @foreach ($product->colors->unique('id') as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="subtitle my-3 theme-text">Sizes:</div>
                        <div class="select-colors d-flex">
                            <div class="">
                                <select class="form-control" name="size_id">
                                    <option> Select size</option>
                                    @foreach ($product->sizes->unique('id') as $size)
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="number" name="quantity" class="form-control pt-3" value="1">
                        </div>


                        <div class="col-md-3">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn addBtn btn-block">Add to cart</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="additional-details my-5 text-center">
            <!-- Nav pills -->
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-tabs">
                    <a class="nav-link active" data-toggle="tab" data-bs-toggle="tab" href="#home">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" data-bs-toggle="tab" href="#menu1">Reviews</a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content mt-4 mb-3">
                <div class="tab-pane container active" id="home">
                    <div class="description">
                        {{ $product->description }}
                    </div>
                </div>
                <div class="tab-pane container fade" id="menu1">
                    {{-- <div class="review">
                    <p>PUT REVIEWS DESIGN HERE</p>
                </div> --}}

                    <!-- Assuming you're in a Blade template file for a product detail page -->

                    <div class="container">
                        <div class="row" style="margin-top:40px;">
                            <div class="col-md-6">
                                <div class="well well-sm">

                                    <div class="row" id="post-review-box">
                                        <div class="col-md-12">
                                            <form action="" method="post">
                                                <input id="ratings-hidden" name="rating" type="hidden">
                                                <textarea class="form-control animated" cols="50" id="new-review" name="comment"
                                                    placeholder="Enter your review here..." rows="5"></textarea>

                                                <div class="text-right">
                                                    <div class="stars starrr" data-rating="0"></div>
                                                    <a class="btn btn-danger btn-sm" href="#" id="close-review-box"
                                                        style="display:none; margin-right: 10px;">
                                                        <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                                    <button class="btn btn-success btn-lg" type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>



        <div class="related-products details-snippet1">

            <div class="related-heading theme-text mb-5">Related Products</div>

            <div class="row">
                @foreach ($relatedProducts as $Relatedproduct)
                    <div class="col-md-3">
                        <div class="related-product">
                            <a href="{{ route('product-details', $product->slug) }}">
                                <img class=""
                                    src="{{ asset('Images/Products/' . $Relatedproduct->images->first()->image_url) }}"
                                    alt="{{ $Relatedproduct->name }}" width="200px" height="250px">
                            </a>
                        </div>

                        <a href="{{ route('product-details', $product->slug) }}" class="text-decoration-none">

                            <div class="related-title">{{ $Relatedproduct->name }}</div>
                        </a>
                        <div class="d-flex">
                            <div class="related-price mr-auto">EGP {{ $Relatedproduct->price }}</div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>



    </div>
@endsection



@push('js')
    <script>
        $(document).ready(function() {
            const flashMessage = $('#flash-message');
            if (flashMessage.length) {
                setTimeout(() => {
                    flashMessage.fadeOut('slow', function() {
                        $(this).remove();
                    });
                }, 3000); // Display for 3 seconds before starting the fade-out
            }
        });


    </script>
@endpush



