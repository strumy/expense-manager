@extends('layouts.app')

@section('top')
    <section id="message">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    @include('layouts.message')
                    <h2>Login</h2>
                    <p class="lead">Please enter your user email and password below to login. </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('services')
    <section class="bg-light" id="login">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        @session('error')
                            <div class="alert alert-danger" role="alert"> 
                                {{ session('error') }}
                            </div>
                        @endsession

                        <div class="row gy-2 overflow-hidden">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="example@xyz.com" required>
                                    <label for="email" class="form-label">{{ __('Email ') }}</label>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required>
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="d-flex gap-2 justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="rememberMe" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Keep me logged in</label>
                                    </div>
                                    <a href="#">Forgot password?</a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid my-3">
                                    <button class="btn btn-dark btn-lg" type="submit">{{ __('Login') }}</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-center">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection