@extends('layouts.app')

@section('top')
    <section id="home">
        <div class="container-flex px-4">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @include('layouts.message')
                    <div class="d-flex justify-content-between my-3">
                        <h2>Transaction Details</h2>
                        <a class="btn btn-secondary" href="{{ route('user.transactions.index') }}" >Transaction List</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')

<section class="bg-light" id="show_transaction">
    <div class="container-flex py-2">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="container mt-4">
                    <div class="card">
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
                            <a class="btn btn-warning" href="{{ route('user.transactions.edit', $transaction) }}">Update Transaction</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
