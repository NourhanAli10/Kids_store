@extends('store.master')



@push('css')
    <style>
        .profile {
            margin: 100px;
        }

        .sidebar {
            height: 100%;
            /* width: 250px; */

            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #000;
            display: block;
        }

        .sidebar a:hover {
            background-color: #ddd;
        }

        .sidebar a.active {
            color: #e83e8c;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }




        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .logout-btn {
            background-color: transparent !important;
            border: none !important;
            text-align: start !important;

        }

        #additional-address-checkbox {
            width: 20px;
            margin-right: 10px;
        }
    </style>
@endpush

@section('content')
    <!-- breadcrumb -->

    <div class="bg-dark breadcrumb-nav" aria-label="breadcrumb">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">My Account</h1>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My account</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <!-- End of breadcrumb -->


    <div class="row profile">


        <div class="sidebar col-3">
            <h2>My account</h2>
            <a href="#profile-info" class="active">Account details</a>
            <a href="#orders">Orders</a>
            <a href="#addresses">Addresses</a>
            <a href="#reset-password">Reset your password</a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="tab-content col-8">

            <div class="tab-pane fade show active" id="profile-info">
                <h1>My Account</h1>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('update-user', Auth::user()->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}"
                            required>
                        @error('name')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="email">Email address *</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"
                            required>
                        @error('email')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input type="phone" name="phone" id="phone" class="form-control" value="{{ $user->phone }}"
                            required>
                        @error('phone')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="phone">Address 1</label>
                        <input type="phone" name="phone" id="phone" class="form-control" value="" disabled>
                    </div>

                    <div class="form-group">
                        <label for="address1">Address 2</label>
                        <input type="text" name="address1" id="address1" class="form-control" value="" disabled>
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="" disabled>
                    </div> --}}


                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>

            <div class="tab-pane fade" id="orders">
                <p>No orders till now</p>

            </div>

            <div class="tab-pane fade" id="addresses">
                <h1>Addresses</h1>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('store-address') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="building-number">Building number *</label>
                        <input type="number" name="building" id="building-number" class="form-control" value=""
                            required>
                    </div>

                    <div class="form-group">
                        <label for="street">Street *</label>
                        <input type="text" name="street" id="street" class="form-control" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="floor">Floor</label>
                        <input type="number" name="floor" id="floor" class="form-control"
                            value="" required>
                    </div>

                    <div class="form-group">
                        <label for="apartment">Appartment</label>
                        <input type="number" name="apartment" id="apartment" class="form-control" value=""
                            required>
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <label for="region">Region</label>
                        <input type="text" name="region" id="region" class="form-control" value="">
                    </div>

                    <div class="form-group d-flex ">
                        <input type="checkbox" id="additional-address-checkbox">
                        <label for="additional-address-checkbox">Add another address</label>
                    </div>

                    <button type="submit" class="btn">Save changes</button>

                </form>


                <form action="{{ route('store-address') }}" method="POST">
                    @csrf

                    <div class="mt-4" id="additional-address-form" style="display: none;">
                        <h3>Additional Address</h3>
                        <div class="form-group">
                            <label for="additional-building-number">Building number *</label>
                            <input type="number" name="additional_building" id="additional-building-number"
                                class="form-control" value="">
                        </div>

                        <div class="form-group">
                            <label for="additional-street">Street *</label>
                            <input type="text" name="additional_street" id="additional-street" class="form-control"
                                value="">
                        </div>

                        <div class="form-group">
                            <label for="additional-floor">Floor</label>
                            <input type="number" name="additional_floor" id="additional-floor" class="form-control"
                                value="">
                        </div>

                        <div class="form-group">
                            <label for="additional-phone">Appartment</label>
                            <input type="phone" name="additional_phone" id="additional-phone" class="form-control"
                                value="">
                        </div>

                        <div class="form-group">
                            <label for="additional-city">City</label>
                            <input type="text" name="additional_city" id="additional-city" class="form-control"
                                value="">
                        </div>
                        <button type="submit" class="btn">Save changes</button>

                    </div>




                </form>
            </div>


            <div class="tab-pane fade" id="reset-password">
                <h1>Reset your password</h1>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="current-password">Current Password</label>
                        <input type="password" name="current_password" id="current-password" class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" name="password" id="new-password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm new password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" value="" required>
                    </div>


                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>

    </div>
@endsection



@push('js')
    <script>
        $(document).ready(function() {
            $('.sidebar a').on('click', function(e) {
                e.preventDefault();
                $('.sidebar a').removeClass('active');
                $(this).addClass('active');
                $('.tab-pane').removeClass('show active');
                $($(this).attr('href')).addClass('show active');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#image").change(function() {
                var files = this.files;
                $('#imagePreviewContainer').empty(); // Clear previous previews

                if (files.length > 0) {
                    $.each(files, function(index, file) {
                        if (file.type.match('image.*')) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var imgHtml = `
                                    <div class="col-3">
                                        <img src="${e.target.result}" class="img-thumbnail" alt="Preview">
                                    </div>
                                `;
                                $('#imagePreviewContainer').append(imgHtml);
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#additional-address-checkbox').change(function() {
                if ($(this).is(':checked')) {
                    $('#additional-address-form').show();
                } else {
                    $('#additional-address-form').hide();
                }
            });
        });
    </script>
@endpush
