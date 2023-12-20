<?php

namespace App\Http\Controllers;

use App\Enums\ModifiedEnum;
use App\Enums\ResponseStatus;
use App\Http\Requests\LibraryPassRequest;
use App\Models\LibraryPass;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;

class LibraryPassController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $passes = LibraryPass::all();
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
    public function store(LibraryPassRequest $request)
    {
        $validated = $request->validated();

        $libraryPass = LibraryPass::create([
            'user_id' => $validated['user_id'],
            'barcode' => $validated['barcode'],
            'is_active' => $validated['is_active'],
            'modified_kind' => ModifiedEnum::inserted,
            'modified_user' => auth()->id(),
        ]);

        return $this->CommonResponse(ResponseStatus::created,
            'Library pass created successfully',
            $libraryPass,
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(LibraryPass $libraryPass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LibraryPass $libraryPass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LibraryPassRequest $request, LibraryPass $libraryPass)
    {
        $validated = $request->validated();

        $libraryPass->update([
            'user_id' => $validated['user_id'],
            'barcode' => $validated['barcode'],
            'is_active' => $validated['is_active'],
            'modified_kind' => ModifiedEnum::modified,
            'modified_user' => auth()->user()->id,
        ]);

        return $this->CommonResponse(ResponseStatus::success,
            'Library pass updated successfully',
            null,
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LibraryPass $libraryPass)
    {
        $libraryPass->delete();
        return $this->CommonResponse(ResponseStatus::success,
            'Library pass deleted successfully',
            null,
        );
    }
}
