<?php

namespace App\Http\Controllers;

use App\Enums\ModifiedEnum;
use App\Enums\ResponseStatus;
use App\Http\Requests\FineRequest;
use App\Models\Fine;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;

class FineController extends Controller
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
    public function store(FineRequest $request)
    {
        $validated = $request->validated();
        $fine = Fine::create([
            'grant_id' => $validated['grant_id'],
            'amount' => $validated['amount'],
            'modified_kind' => ModifiedEnum::inserted,
            'modified_user' => Auth()->id(),
        ]);

        return $this->CommonResponse(
            ResponseStatus::created,
            'Fine created successfully',
            ['fine' => $fine],
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Fine $fine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fine $fine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fine $fine)
    {
        $validated = $request->validated();

        //TODO: Check: do we want to update the grant_id?
        $fine->update([
            'amount' => $validated['amount'],
            'modified_kind' => ModifiedEnum::modified,
            'modified_user' => Auth()->id(),
        ]);

        return $this->CommonResponse(
            ResponseStatus::success,
            'Fine updated successfully',
            ['fine' => $fine],
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fine $fine)
    {
        $fine->delete();

        return $this->CommonResponse(
            ResponseStatus::success,
            'Fine deleted successfully',
            null,
        );
    }
}
