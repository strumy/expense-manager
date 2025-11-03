@extends('layouts.app')

@section('top')
    <section id="home">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    @include('layouts.message')
                    <h2>Add New Transaction</h2>
                    <p class="lead">Please provide the required transaction data to create a new tranaction.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('services')

<section class="bg-light" id="create_transaction">
    <div class="container py-2">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between mb-3">
                    <a class="btn btn-primary" href="{{ route('transactions.index') }}">Transaction List</a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('transactions.store') }}">
                    @csrf

                    @session('error')
                        <div class="alert alert-danger" role="alert"> 
                            {{ session('error') }}
                        </div>
                    @endsession
                    <div class="row mb-4">
                        <div class="col">
                            <div class="mb-4">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Write the purpose of your transaction."required>
                            </div>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="mb-4">
                                <label class="form-label" for="amount">Amount</label>
                                <input type="number" id="amount" class="form-control" step="0.01" name="amount" placeholder="Type any amount above 0.0" required>
                            </div>
                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="mb-4">
                                <label for="date_of_transaction" class="form-label" hidden>Date</label>
                                <input type="date" class="form-control" name="date_of_transaction" id="date_of_transaction" required>
                            </div>
                            @error('date_of_transaction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="mb-4">
                                <select class="form-select" name="type" id="type" required>
                                    <option value="expense">Expense</option>
                                    <option value="income">Income</option>
                                </select>
                            </div>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="mb-4">
                                <select class="form-select" name="status" id="status" required>
                                    <option value="enabled" selected>Enabled</option>
                                    <option value="disabled">Disabled</option>
                                </select>
                            </div>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input id="user_id" name="user_id" type="hidden" value="{{ auth()->user()->id }}">
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block mb-4" type="submit">Create Transactionr</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
