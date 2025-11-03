@extends('layouts.app')

@section('top')
    <section id="home">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    @include('layouts.message')
                    <h2>List of Transactions</h2>
                    <p class="lead">This application helps you to record your expense and income.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('services')

<section class="bg-light" id="transaction_list">
    <div class="container-flex">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="d-flex justify-content-between mb-3">
                    <h2>Transaction List</h2>
                    <a class="btn btn-primary" href="{{ route('transactions.create') }}">Create Transaction</a>
                </div>
                <form method="GET" action="{{ route('transactions.index') }}">
                    <div class="d-flex flex-row input-group mb-3">
                        <select class="form-select form-control" aria-label="TypeSelect" name="type", id="type">
                            <option value="any" 
                            @if( app('request')->input('type') == 'any' )
                                <option value="any" selected>Any</option>
                                <option value="expense">Expense</option>
                                <option value="income">Income</option>
                            @elseif (app('request')->input('type') == 'expense' )
                                <option value="any">Any</option>
                                <option value="expense" selected>Expense</option>
                                <option value="income">Income</option>
                            @elseif ( app('request')->input('type') == 'income' )
                                <option value="any">Any</option>
                                <option value="expense">Expense</option>
                                <option value="income" selected>Income</option>
                            @else
                                <option value="any" selected>Any</option>
                                <option value="expense">Expense</option>
                                <option value="income">Income</option>
                            @endif
                        </select>
                        <input type="text" class="form-control" aria-label="Search term" placeholder="Type a search term" name="searchterm"
                        @if  ( app('request')->input('searchterm') != '')
                        value="{{ app('request')->input('searchterm')  }}"
                        @endif
                        >
                        <button type="submit" class="form-control btn btn-outline-secondary w-3">Search</button>
                    </div>
                </form>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->title }}</td>
                        <td>@if ( $transaction->type == "expense")
                            <h5><span class="badge badge-primary">{{ $transaction->type }}</span></h5>
                            @else
                            <h5><span class="badge badge-success">{{ $transaction->type }}</span></h5>
                            @endif
                        </td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaction->date_of_transaction)->format('F j, Y')}}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('transactions.show', $transaction) }}">Show</a>
                            <a class="btn btn-warning btn-sm" href="{{ route('transactions.edit', $transaction) }}">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this transaction?');">
                                @csrf 
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" >Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
