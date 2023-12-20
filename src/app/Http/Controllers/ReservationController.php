<?php

namespace App\Http\Controllers;

use App\Enums\ModifiedEnum;
use App\Enums\ResponseStatus;
use App\Http\Requests\ReserveRequest;
use App\Models\Reservation;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;

class ReservationController extends Controller
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
    public function store(ReserveRequest $request)
    {
        $validated = $request->validated();

        $reservation = Reservation::create([
            'user_id' => $validated['user_id'],
            'item_id' => $validated['item_id'],
            'status' => $validated['status'],
            'modified_kind' => ModifiedEnum::inserted,
            'modified_user' => auth()->id(),
        ]);

        return $this->CommonResponse(ResponseStatus::created,
            'Reservation created successfully',
            $reservation,
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReserveRequest $request, Reservation $reservation)
    {
        $validated = $request->validated();

        $reservation->update([
            'user_id' => $validated['user_id'],
            'item_id' => $validated['item_id'],
            'status' => $validated['status'],
            'modified_kind' => ModifiedEnum::modified,
            'modified_user' => auth()->id(),
        ]);

        return $this->CommonResponse(ResponseStatus::success,
            'Reservation updated successfully',
            ["reservation" => $reservation],
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return $this->CommonResponse(ResponseStatus::success,
            'Reservation deleted successfully',
            null,
        );
    }
}
