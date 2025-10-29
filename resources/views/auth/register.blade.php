@extends('layouts.app')

@section('top')
    <section id="signup">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    @include('layouts.message')
                    <h2>Signup</h2>
                    <p class="lead">Please enter the following your user account information to signup for an account. </p>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('services')
    <section class="bg-light" id="registration">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        <div class="row gy-2 overflow-hidden">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name"  required>
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                </div>
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="example@xyz.com" required>
                                <label for="email" class="form-label">{{ __('Email ID') }}</label>
                                </div>
                                @error('email')
                                    <span class="text-danger" role="alert">
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
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" value="" placeholder="password_confirmation" required>
                                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                </div>
                                @error('password_confirmation')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="d-grid my-3">
                                <button class="btn btn-dark btn-lg" type="submit">{{ __('Register') }}</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-center">Already have an account? <a href="{{ route('login') }}" class="link-dark">Login</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection