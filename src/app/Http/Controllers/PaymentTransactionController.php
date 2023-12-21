<?php

namespace App\Http\Controllers;

use App\Enums\ModifiedEnum;
use App\Enums\ResponseStatus;
use App\Http\Requests\PaymentTransactionRequest;
use App\Models\PaymentTransaction;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;

class PaymentTransactionController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentTransactionRequest $request)
    {
        $validated = $request->validated();
        $paymentTransaction = PaymentTransaction::create([
            'fine_id' => $validated['fine_id'],
            'amount' => $validated['amount'],
            'modified_kind' => ModifiedEnum::inserted,
            'modified_user' => Auth()->id(),
        ]);

        return $this->CommonResponse(
            ResponseStatus::created,
            'Payment transaction created successfully',
            ['paymentTransaction' => $paymentTransaction],
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentTransaction $paymentTransaction)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentTransaction $paymentTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentTransactionRequest $request, PaymentTransaction $paymentTransaction)
    {
        $validated = $request->validated();
        $paymentTransaction->update([
            'amount' => $validated['amount'],
            'modified_kind' => ModifiedEnum::modified,
            'modified_user' => Auth()->id(),
        ]);

        return $this->CommonResponse(
            ResponseStatus::success,
            'Payment transaction updated successfully',
            ['paymentTransaction' => $paymentTransaction],
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentTransaction $paymentTransaction)
    {
        $paymentTransaction->delete();
        return $this->CommonResponse(
            ResponseStatus::success,
            'Payment transaction deleted successfully',
            null,
        );
    }
}
