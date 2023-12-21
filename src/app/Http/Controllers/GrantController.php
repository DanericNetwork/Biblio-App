<?php

namespace App\Http\Controllers;

use App\Enums\ModifiedEnum;
use App\Enums\ResponseStatus;
use App\Http\Requests\GrantRequest;
use App\Models\Grant;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;

class GrantController extends Controller
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
    public function store(GrantRequest $request)
    {
        $validated = $request->validated();
        $grant = Grant::create([
            'user_id' => $validated['user_id'],
            'item_id' => $validated['item_id'],
            'borrowed_date' => $validated['borrowed_date'],
            'return_date' => $validated['return_date'],
            'modified_kind' => ModifiedEnum::inserted,
            'modified_user' => Auth()->id(),
        ]);
        return $this->CommonResponse(
            ResponseStatus::created,
            'Grant created successfully',
            $grant);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grant $grant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grant $grant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GrantRequest $request, Grant $grant)
    {
        $validated = $request->validated();

        $grant->update([
            'user_id' => $validated['user_id'],
            'item_id' => $validated['item_id'],
            'borrowed_date' => $validated['borrowed_date'],
            'return_date' => $validated['return_date'],
            'modified_kind' => ModifiedEnum::modified,
            'modified_user' => Auth()->id(),
        ]);

        return $this->CommonResponse(
            ResponseStatus::success,
            'Grant updated successfully',
            ['grant' => $grant]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grant $grant)
    {
        $grant->delete();
        return $this->CommonResponse(
            ResponseStatus::success,
            'Grant deleted successfully',
            null);
    }
}
