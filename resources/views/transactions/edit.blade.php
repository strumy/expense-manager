@extends('layouts.app')

@section('top')
    <section id="home">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    @include('layouts.message')
                    <h2>Update Transaction</h2>
                    <p class="lead">Please provide the correct required transaction data to update the tranaction with id:{{ $transaction->id }}.</p>
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

                <form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
                    @csrf
                    @method('PUT')

                    @session('error')
                        <div class="alert alert-danger" role="alert"> 
                            {{ session('error') }}
                        </div>
                    @endsession
                    <div class="row mb-4">
                        <div class="col">
                            <div class="d-flex flex-row align-items-start mb-3">
                                <label class="form-label mx-2" for="title">Title</label>
                                <input type="text" id="title" class="form-control  @error('title') is-invalid @enderror" name="title" placeholder="Write the purpose of your transaction." 
                                value="{{ old('title', $transaction->title) }}" 
                                required>
                                
                            </div>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col">
                            <div class="d-flex flex-row align-items-start mb-3">
                                <label class="form-label mx-2" for="amount">Amount</label>
                                <input type="number" id="amount" class="form-control @error('amount') is-invalid @enderror" step="0.01" name="amount" 
                                placeholder="Type any amount above 0.0" 
                                value="{{ old('amount', $transaction->amount) }}"
                                required>
                                
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
                            <div class="d-flex flex-row align-items-start mb-3">
                                <label for="date_of_transaction" class="form-label mx-2">Date</label>
                                <input type="date" class="form-control @error('date_of_transaction') is-invalid @enderror" name="date_of_transaction" 
                                id="date_of_transaction" 
                                value="{{ old('date_of_transaction', \Carbon\Carbon::parse($transaction->date_of_transaction)->format('Y-m-d')) }}"
                                
                                required>
                                
                            </div>
                            @error('date_of_transaction')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="d-flex flex-row align-items-start mb-3">
                                <label for="type" class="form-label mx-2">Type</label>
                                <select class="form-select @error('type') is-invalid @enderror" name="type" id="type" required>
                                    <option value="expense" {{ old('type', $transaction->type) == 'expense' ? 'selected' : '' }}>Expense</option>
                                    <option value="income" {{ old('type', $transaction->type) == 'income' ? 'selected' : '' }}>Income</option>
                                </select>
                            </div>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="d-flex flex-row align-items-start mb-3">
                                <label for="status" class="form-label mx-2">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status" id="status" required>
                                    <option value="enabled" {{ old('status', $transaction->status) == 'enabled' ? 'selected' : '' }}>Enabled</option>
                                    <option value="disabled" {{ old('status', $transaction->status) == 'disabled' ? 'selected' : '' }}>Disabled</option>
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
                    <div class="col">
                        <div class="d-flex flex-row mb-3">
                            <div class="p-2"><button class="btn btn-primary" type="submit">Update Transactionr</button></div>
                            <div class="p-2"><a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-secondary">Cancel</a></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
