<?php

// app/Http/Controllers/TransactionController.php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Material;
use App\Models\Category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('material')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $categories = Category::all();
        $materials = Material::all();
        return view('transactions.create', compact('categories', 'materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'material_id' => 'required',
            'date' => 'required|date',
            'quantity' => 'required|numeric',
        ]);
        Transaction::create($request->all());
        return redirect()->route('transactions.index');
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $categories = Category::all();
        $materials = Material::all();
        return view('transactions.edit', compact('transaction', 'categories', 'materials'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'material_id' => 'required',
            'date' => 'required|date',
            'quantity' => 'required|numeric',
        ]);
        $transaction->update($request->all());
        return redirect()->route('transactions.index');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index');
    }
}

