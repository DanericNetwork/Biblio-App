<?php

namespace App\Http\Controllers;

use App\Enums\ModifiedEnum;
use App\Enums\ResponseStatus;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\SearchItemRequest;
use App\Models\Item;
use App\Traits\CommonTrait;

class ItemController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // render page
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // render page
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        $validated = $request->validated();

        $item = Item::create([
            'Identifier' => '', //TODO: Use trait to generate valid identifier
            'type' => $validated['type'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'ISBN' => $validated['ISBN'],
            'rating' => $validated['rating'],
            'borrowing_time' => $validated['borrowing_time'],
            'modified_kind' => 'I',
            'modified_user' => auth()->user()->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        // render page
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, Item $item)
    {
        $validated = $request->validated();

        // update the items with the new data
        $item->update([
            'type' => $validated['type'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'ISBN' => $validated['ISBN'],
            'rating' => $validated['rating'],
            'borrowing_time' => $validated['borrowing_time'],
            'modified_kind' => ModifiedEnum::modified,
            'modified_user' => auth()->id(),
        ]);

        return $this->CommonResponse(
            ResponseStatus::success,
            'Item updated',
            $item
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return $this->CommonResponse(
            ResponseStatus::success,
            'Item deleted',
            null,
        );
    }

    public function search(SearchItemRequest $request) {
      $validated = $request->validated();
      $search = $validated['search'];

      $items = Item::where('name', 'like', "%{$search}%")
        ->orWhere('description', 'like', "%{$search}%")
        ->orWhere('category', 'like', "%{$search}%")
        ->orWhere('ISBN', 'like', "%{$search}%")
        ->get();

      return $this->CommonResponse(
        ResponseStatus::success,
        'Search results',
        $items
      );
    }
}
