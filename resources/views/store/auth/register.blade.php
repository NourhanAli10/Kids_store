@extends('Store.master')

@section('title', 'Register')

@section('content')
    <main>
        <section class="container ">
            <div class="row register mt-5">
                <div class="col-6">
                    <img src="{{ asset('front_assets/Images/kid.png') }}">
                </div>

                <form action="{{ route('register') }}" method="post" class="col-6 mt-5">
                    @csrf
                    <h3 class="mb-3 text-center">Registration Form</h3>
                    <div class="mb-4">
                        <label for="first_name" class="form-label">First
                            name</label>
                        <input type="text" class="form-control input" id="first_name" name="first-name"
                            value="{{ old('first-name') }}">
                        @error('first-name')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="last_name" class="form-label">last
                            name</label>
                        <input type="name" class="form-control input" id="last_name" name="last-name"
                            value="{{ old('last-name') }}">
                        @error('last-name')
                            <p class="text-danger mt-2  ml-3">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control input" id="email" name="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="Phone-number" class="form-label">Phone
                            number</label>
                        <input type="phone" class="form-control input" id="Phone-number" name="phone"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control input" id="password" name="password">
                        @error('password')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Confirm
                            Password</label>
                        <input type="password" class="form-control input" id="password" name="password_confirmation">
                        @error('password-confirmation')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Checkbox -->
                    <div class="form-check d-flex mt-4">
                        <input class="form-check-input me-2" type="checkbox" value id="registerCheck" checked
                            aria-describedby="registerCheckHelpText" />
                        <label class="form-check-label" for="registerCheck">
                            I have read and agree to the terms
                        </label>
                    </div>
                    <button type="submit" class="btn mt-4">Register</button>

                    <div class="mt-4 d-flex justify-content-center">
                        <p class="fw-bold">
                            Already have an account ? <a href="{{ route('login') }}">Login</a>
                        </p>
                    </div>
                </form>

            </div>

        </section>
    </main>
@endsection
