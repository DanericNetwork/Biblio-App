<?php

namespace App\Http\Controllers;

use App\Enums\ModifiedEnum;
use App\Enums\Permissions;
use App\Enums\ResponseStatus;
use App\Http\Requests\GrantItemRequest;
use App\Http\Requests\GrantRequest;
use App\Models\Grant;
use App\Models\Item;
use App\Models\LibraryPass;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;
use Illuminate\Support\Env;

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

    public function GrantItem(GrantItemRequest $request) {
      $validated = $request->validated();

      $item = Item::where('identifier', $validated['identifier'])->first();
      $library_pass = LibraryPass::where('barcode', $request->bearerToken())->first();
      $user = User::where('id', $library_pass->user_id)->first();

      if (!isset($user)) {
        return $this->CommonResponse(
          ResponseStatus::notFound, 'User not found', null
        );
      }

      if (!$user->can(Permissions::CREATE_GRANT->value) && Env::get('APP_ENV') != 'local') {
        return $this->CommonResponse(
          ResponseStatus::unauthorized, 'Unauthorized', null
        );
      }

      $grant = Grant::where('user_id', $user->id)
        ->where('item_id', $item->id)
        ->where('modified_kind', '!=', ModifiedEnum::deleted)
        ->where('return_date', null)
        ->first();

      if (isset($grant)) {

        $grant->return_date = now();
        $grant->modified_kind = ModifiedEnum::modified;
        $grant->modified_user = $user->id;
        $grant->save();

        $message = 'Item returned successfully';
      } else {
        $grant = Grant::create([
          'user_id' => $user->id,
          'item_id' => $item->id,
          'borrowed_date' => now(),
          'return_date' => null,
          'modified_kind' => ModifiedEnum::inserted,
          'modified_user' => $user->id,
        ]);

        $message = 'Item granted successfully';
      }

      return $this->CommonResponse(
        ResponseStatus::success, $message, $grant
      );
    }
}
