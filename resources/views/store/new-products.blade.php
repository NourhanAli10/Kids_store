<!-- Blade Template -->

<!-- Container for New Products -->
<div class="tab-pane fade" id="new-products">
    <div class="row justify-content-between mt-5" id="new-products-container">
        <!-- Initial content will be injected here by server-side rendering -->
        @foreach ($newProducts as $product)
            <div class="col-3 new-arrival">
                <div class="hover">
                    <a href="{{ route('product-details', $product->slug) }}">
                        <img src="{{ asset('Images/products/' . $product->images->first()->image_url) }}" alt="{{ $product->name }}">
                    </a>
                    <div class="product-icon">
                        <a href="#" class="icon addToWishlist" data-product-id="{{ $product->id }}">
                            <span class="material-symbols-outlined">favorite</span>
                        </a>
                        <a href="#" class="icon">
                            <span class="material-symbols-outlined">shopping_bag</span>
                        </a>
                        <a href="#" class="icon">
                            <span class="material-symbols-outlined">visibility</span>
                        </a>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('product-details', $product->slug) }}" class="text-decoration-none">
                        <p class="text-center text-dark fw-bold">{{ $product->name }}</p>
                    </a>
                    <div>
                        <p class="product-price">EGP {{ $product->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pt-5 d-block m-auto text-center">
        <button class="btn btn-primary btn-lg" id="show-all-new-products">Show All</button>
    </div>
</div>
