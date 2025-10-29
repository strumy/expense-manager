@extends('layouts.app')

@section('top')
    <section id="home">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    @include('layouts.message')
                    @if(auth()->check())
                    <h2>Welcome {{ auth()->user()->name }}</h2>
                    @endif
                    <p class="lead">This application helps you to record your expense and income.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('services')
@endsection