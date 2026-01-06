<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Transaction as FormTransactionRequest;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchterm = $request->input('searchterm') ? $request->input('searchterm') : null;
        $type = $request->input('type') ? $request->input('type') : null;
        $perPage = 10;

        if ( ($type == 'expense' || $type == 'income' ) && $searchterm == null) {
            $transactions = auth()->user()->transactions()->where('type', '=',$type)
                                        ->with('user')
                                        ->paginate($perPage);
        } elseif ( ($type == 'expense' || $type == 'income' ) && $searchterm != null) {
            $transactions = auth()->user()->transactions()->where('type', '=',$type)
                                        ->where('title', 'like', '%'. $searchterm . '%')
                                        ->with('user')
                                        ->paginate($perPage);
        } elseif ($type == 'any' || $searchterm != null) {
            $transactions = auth()->user()->transactions()->where('title', 'like', '%'. $searchterm . '%')
                                        ->with('user')
                                        ->paginate($perPage);
        }
        else {
            $transactions = auth()->user()->transactions()->with('user')->paginate($perPage);
        }

        $transactions->appends(key: ['searchterm' => $searchterm]);
        $transactions->appends(key: ['type' => $type]);

        return view('auth.user.transactions.index', compact('transactions' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.user.transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormTransactionRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Transaction::create($validated);

        return redirect()->route('user.transactions.index')->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $transaction = Transaction::findOrFail($id);
        $message = 'Transaction with id = ' . str($id) . "retrieved successfully.";

        return view('auth.user.transactions.show', compact('transaction', 'message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $transaction = Transaction::findOrFail($id);
        
        return view('auth.user.transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormTransactionRequest $request, int $id): RedirectResponse
    {
        $validated = $request->validated();

        Transaction::findOrFail($id)->update($validated);

        return redirect()->route('user.transactions.index')->with(key: 'message', value: 'Transaction with id: '.str($id).' was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $transaction = Transaction::findOrFail($id);
        DB::beginTransaction();
            try {
                $transaction->delete();
            } catch (\Exception $e) {  
                DB::rollBack();
            }
        DB::commit(); 

        return redirect()->route('user.transactions.index')->with('success', 'Transaction with id:'.str($id).' was deleted successfully.');
    }
}
