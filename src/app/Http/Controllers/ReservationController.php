<?php

namespace App\Http\Controllers;

use App\Enums\ModifiedEnum;
use App\Enums\ResponseStatus;
use App\Http\Requests\ReserveRequest;
use App\Http\Requests\SearchReservationRequest;
use App\Models\Item;
use App\Models\Reservation;
use App\Models\User;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Laravel\SerializableClosure\UnsignedSerializableClosure;

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

    public function search(SearchReservationRequest $request)
    {
      $validated = $request->validated();
      $search = $validated['search'];

      $item = Item::where('name', 'like', "%{$search}%")->orWhere('ISBN', 'like', "%{$search}%")->first();
      $user = User::where('last_name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%")->orWhere('zip_code', 'like', "%{$search}%")->first();

      $reservations = Reservation::where('item_id', $item->id)->orWhere('user_id', $user->id)->get();

      return $this->CommonResponse(ResponseStatus::success,
            'Reservation found',
            ["reservations" => $reservations],
        );
    }
}
