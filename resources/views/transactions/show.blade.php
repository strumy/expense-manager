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

<section class="bg-light" id="show_transaction">
    <div class="container py-2">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="container mt-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4>Transaction Details</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $transaction->id }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $transaction->title }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>
                                        @if ( ucfirst($transaction->type) == "expense")
                                            <h5><span class="badge badge-primary">{{ ucfirst($transaction->type) }}</span></h5>
                                            @else
                                            <h5><span class="badge badge-success">{{ ucfirst($transaction->type) }}</span></h5>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>${{ number_format($transaction->amount, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Date of Transaction</th>
                                    <td>{{ \Carbon\Carbon::parse($transaction->date_of_transaction)->format('F j, Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($transaction->status == 'enabled')
                                            <span class="badge bg-success">Enabled</span>
                                        @else
                                            <span class="badge bg-secondary">Disabled</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
