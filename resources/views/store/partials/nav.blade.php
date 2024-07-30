<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand text-dark fw-bold" href="{{ route('home') }}">
                <img src="{{ asset('front_assets/Images/logo.jfif') }}" alt="logo">
                Reino Kids
            </a>
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link text-dark active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('product-category', 'boys') }}">Boys</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('product-category', 'girls') }}">Girls</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('product-category', 'babies') }}">Babies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('product-category', 'accessories') }}"">Accessories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="">Brands</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="Contact-us.html">Contact
                        us</a>
                </li>
            </ul>


            <div class="d-flex justify-content-between">
                <ul class="navbar-nav">
                    <li>

                        <a href="{{ route('wishlist-page') }}" class="nav-link text-decoration-none text-dark"
                            aria-label="Wishlist" id="wishlist-icon">
                            <span class="material-symbols-outlined d-block">
                                favorite_border
                            </span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-decoration-none text-dark" aria-label="Search">
                            <span class="material-symbols-outlined d-block">search</span>
                        </a>
                    </li>

                    @if (!Auth::user())
                        <!-- User is not authenticated -->
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link text-decoration-none text-dark"
                                data-text="login">
                                <span class="material-symbols-outlined d-block">person</span>
                            </a>
                        </li>
                    @else
                        <!-- Display avatar dropdown for authenticated users -->
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" href="#" id="navbarDropdownMenuAvatar"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @php
                                    $fullName = Auth::user()->name;
                                    $name = explode(' ', $fullName);
                                    $firstName = $name[0];
                                @endphp
                                {{ $firstName }}

                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                <li><a class="dropdown-item" href="{{ route('user-profile') }}">My profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                            </ul>
                        </li>
                    @endif

                    <!-- Cart icon -->
                    <li class="nav-item">
                        <a href="#" class="nav-link text-decoration-none text-dark" aria-label="Cart"
                            id="cart-icon">
                            <span class="material-symbols-outlined d-block">
                                shopping_cart
                            </span> </a>
                        <div class="shopping-cart" id="shopping-cart">
                            <ul class="shopping-cart-items">
                                @if(Cart::getContent()->isNotEmpty())

                                    @foreach (Cart::getContent() as $item)
                                        <li class="clearfix">
                                            <div class="w-100">
                                                <div class="w-100 d-flex justify_content_between">
                                                    <p class="m-2">{{ $item->name }}</p>
                                                    <img class="m-1" src="{{ asset('Images/Products/' . $item->attributes->image->image_url) }}"
                                                        alt="item1"  />

                                                </div>

                                            </div>

                                            <p class="item-price">{{ $item->quantity }} X EGP{{ $item->price }}</p>

                                        </li>
                                    @endforeach

                            </ul>
                                <a href="{{ route('cart') }}" class="button">Checkout</a>
                                @else
                                <div class="text-center m-2 w-100">
                                    <p>0 items</p>
                                    <p>Your cart is empty</p>
                                </div>

                                <a href="{{ route('show-all-products') }}" class="button">Continue shopping</a>



                                @endif

                        </div> <!-- end shopping-cart -->
                    </li>
                </ul>
            </div>


    </div>
    </nav>
    </div>
</header>
