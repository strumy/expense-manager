<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Transaction as FormTransactionRequest;
use Illuminate\Http\Request;
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

        if ( ($type == 'expense' || $type == 'income' ) && $searchterm == null) {
            $transactions = Transaction::where('type', '=',$type)
                                        ->get();
        } elseif ( ($type == 'expense' || $type == 'income' ) && $searchterm != null) {
            $transactions = Transaction::where('type', '=',$type)
                                        ->where('title', 'like', '%'. $searchterm . '%')
                                        ->get();
        } elseif ($type == 'any' || $searchterm != null) {
            $transactions = Transaction::where('title', 'like', '%'. $searchterm . '%')
                                        ->get();
        }
        else {
            $transactions = Transaction::all();
        }

        return view('transactions.index', compact('transactions' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormTransactionRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Transaction::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $transaction = Transaction::findOrFail($id);
        $message = 'Transaction with id = ' . str($id) . "retrieved successfully.";

        //return view('transactions.show', compact('transaction'));
        return view('transactions.show', compact('transaction', 'message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $transaction = Transaction::findOrFail($id);
        
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormTransactionRequest $request, int $id): RedirectResponse
    {
        $validated = $request->validated();

        Transaction::findOrFail($id)->update($validated);

        return redirect()->route('transactions.index')->with(key: 'message', value: 'Transaction with id: '.str($id).' was updated successfully.');
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

        return redirect()->route('transactions.index')->with('success', 'Transaction with id:'.str($id).' was deleted successfully.');
    }
}
