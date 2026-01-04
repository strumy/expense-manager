@extends('layouts.app')

@section('top')
    <section id="home">
        <div class="container-flex px-4 my-2">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @include('layouts.message')
                    @if(auth()->check())
                    <img src="{{ asset('images/ExpManLogo2.png') }}" alt="ExpenseManagerLogo" class="img-fluid rounded mx-auto d-block">
                    <h2>Welcome {{ auth()->user()->name }}</h2>
                    @endif
                    <p class="lead">This application helps you to record your expense and income.</p>
                    
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
@endsection