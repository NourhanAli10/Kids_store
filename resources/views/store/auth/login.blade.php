@extends('Store.master')

@section('title', 'login')

@section('content')
    <main>
        <section class="container">
            <div class="login-section m-auto ">
                <!-- Pills content -->
                <div class="tab-content m-5">
                    <div class="m-5">
                        <form class="login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <h4 class="text-center mb-4">Login</h4>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label pl-3" for="loginName">Email or username</label>
                                <input type="email" name="email" id="loginName" class="form-control" />
                                @error('email')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="loginPassword">Password</label>
                                <input type="password" name="password" id="loginPassword" class="form-control" />
                            </div>

                            <!-- 2 column grid layout -->
                            <div class="row mb-2">
                                <div class="col-md-6 d-flex justify-content-start">
                                    <!-- Checkbox -->
                                    <div class="form-check mb-3 mb-md-0 remember-me">
                                        <input class="form-check-input" name="remember" type="checkbox" value="" id="loginCheck" />
                                        <label class="form-check-label" for="loginCheck"> Remember me </label>
                                    </div>
                                </div>

                            </div>

                            <!-- Submit button -->
                            <div class="d-block text-center">
                                <button type="submit" class="btn btn-block m-auto text-white">Sign in</button>
                            </div>

                            <div class="d-block text-center">
                                <!-- Simple link -->
                                <p>
                                    <a href="#!" class="">Forgot password?</a>


                                </p>
                            </div>
                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>Don’t have an account? <a href="{{ route('register') }}">Create an account</a></p>
                            </div>

                            <div class="text-center mb-3">
                                <p class="fw-5 mb-3">Or sign in with</p>
                                <div class="text-center mb-3 d-flex justify-content-center">
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fab fa-google"></i>
                                    </a>

                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>



                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <form>
                            <div class="text-center mb-3">
                                <p>Sign up with:</p>
                                <button data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>

                                <button data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                </button>

                                <button data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                </button>

                                <button data-mdb-ripple-init type="button" class="btn btn-secondary btn-floating mx-1">
                                    <i class="fab fa-github"></i>
                                </button>
                            </div>

                            <p class="text-center">or:</p>

                            <!-- Name input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="registerName" class="form-control" />
                                <label class="form-label" for="registerName">Name</label>
                            </div>

                            <!-- Username input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="registerUsername" class="form-control" />
                                <label class="form-label" for="registerUsername">Username</label>
                            </div>

                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" id="registerEmail" class="form-control" />
                                <label class="form-label" for="registerEmail">Email</label>
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" id="registerPassword" class="form-control" />
                                <label class="form-label" for="registerPassword">Password</label>
                            </div>

                            <!-- Repeat Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" id="registerRepeatPassword" class="form-control" />
                                <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck"
                                    checked aria-describedby="registerCheckHelpText" />
                                <label class="form-check-label" for="registerCheck">
                                    Remember me
                                </label>
                            </div>

                            <!-- Submit button -->
                            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-3">Sign
                                in</button>
                        </form>
                    </div>
                </div>
                <!-- Pills content -->

            </div>

        </section>
    </main>
@endsection
