<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Loan::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer' => ['nullable', 'string', 'max:255'],
            'loan_number' => ['nullable', 'string', 'max:255'],
            'date_distributed' => ['nullable', 'date'],
            'loan_type' => ['nullable', 'string', 'max:255'],
            'principle' => ['nullable', 'numeric'],
            'bf' => ['nullable', 'numeric'],
            't_interest' => ['nullable', 'numeric'],
            'fees' => ['nullable', 'numeric'],
            'receipts' => ['nullable', 'numeric'],
            'balance' => ['nullable', 'numeric'],
        ]);

        $loan = Loan::create($validated);

        return response()->json($loan, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        return response()->json($loan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        $validated = $request->validate([
            'customer' => ['nullable', 'string', 'max:255'],
            'loan_number' => ['nullable', 'string', 'max:255'],
            'date_distributed' => ['nullable', 'date'],
            'loan_type' => ['nullable', 'string', 'max:255'],
            'principle' => ['nullable', 'numeric'],
            'bf' => ['nullable', 'numeric'],
            't_interest' => ['nullable', 'numeric'],
            'fees' => ['nullable', 'numeric'],
            'receipts' => ['nullable', 'numeric'],
            'balance' => ['nullable', 'numeric'],
        ]);

        $loan->update($validated);

        return response()->json($loan->fresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();

        return response()->noContent();
    }
}
