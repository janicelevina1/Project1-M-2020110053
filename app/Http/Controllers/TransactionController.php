<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = DB::table('transactions')
                            ->selectRaw("   SUM( amount ) AS jml_all,
                                            SUM( CASE WHEN type = 'income' THEN amount ELSE 0 END ) AS totalIncome,
                                            SUM( CASE WHEN type = 'expense' THEN amount ELSE 0 END ) AS totalExpense,
                                            COUNT( CASE WHEN type = 'income' THEN id END ) AS countIncome,
                                            COUNT( CASE WHEN type = 'expense' THEN id END ) AS countExpense ")
                            ->paginate(5);

        return response(view('index', ['transactions' => $transactions]));
    }

    public function show()
    {
        $transactions = Transaction::whereNotNull('id')->paginate(5);
        return response(view('transaction.show', ['transactions' => $transactions]));
    }

    public function create()
    {
        return response(view('transaction.create'));
    }

    public function store(Request $request){
        Transaction::create([
            'type'      => $request->type,
            'category'  => $request->category,
            'amount'    => $request->amount,
            'notes'     => $request->notes,
        ]);

        return redirect(route('transaction.show'))->with('success', 'Added!');
    }

    public function edit(string $id)
    {
        $transaction = Transaction::findOrFail($id);

        return response(view('transaction.edit', ['transaction' => $transaction]));
    }

    public function update(Request $request, string $id, Transaction $barang)
    {
        $product = Transaction::findOrFail($id);
        $product->update([
            'type'      => $request->type,
            'category'  => $request->category,
            'amount'    => $request->amount,
            'notes'     => $request->notes,
        ]);

        return redirect(route('transaction.show'))->with('success', 'Updated!'); 
    }

    public function destroy(string $id)
    {
        $product = Transaction::findOrFail($id);

        if ($product->delete()) {
            return redirect(route('transaction.show'))->with('success', 'Deleted!');
        }

        return redirect(route('transaction.show'))->with('error', 'Sorry, unable to delete this!');        

    }
}
