<?php

namespace App\Http\Controllers;

use App\Enums\ItemTypes;
use App\Enums\ModifiedEnum;
use App\Enums\Permissions;
use App\Enums\ResponseStatus;
use App\Http\Requests\ApiStoreItemRequest;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\SearchItemRequest;
use App\Models\Author;
use App\Models\Item;
use App\Models\ItemImage;
use App\Models\LibraryPass;
use App\Models\User;
use App\Traits\CommonTrait;
use App\Traits\CommonLibraryTrait;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    use CommonTrait, CommonLibraryTrait;
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
            'category_id' => $validated['category_id'],
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
            'category_id' => $validated['category_id'],
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

      $library_pass = LibraryPass::where('barcode', $request->bearerToken())->first();
      $user = User::where('id', $library_pass->user_id)->first();

      if (!$user->can(Permissions::VIEW_ITEM->value) && Env::get('APP_ENV') != 'local') {
        return $this->CommonResponse(
          ResponseStatus::unauthorized,
          'Permission denied',
          null
        );
      }

      $items = Item::where('name', 'like', "%{$search}%")
        ->orWhere('description', 'like', "%{$search}%")
        ->orWhere('ISBN', 'like', "%{$search}%")
        ->get();

      $authors = Author::where('name', 'like', "%{$search}%")->get();

      if (count($authors) >= 1) {
        foreach ($authors as $author) {

          $author_items = $author->items;
          foreach ($author_items as $author_item) {

            $item_exists = false;
            foreach ($items as $item) {
              if ($item->id == $author_item->id) {
                $item_exists = true;
              }
            }

            if (!$item_exists) {
              $items[] = $author_item;
            }

          }
        }
      }

      return $this->CommonResponse(
        ResponseStatus::success,
        'Search results',
        $this->ReturnMultipleFullItems($items)
      );
    }

    public function ApiStore(ApiStoreItemRequest $request) {
      $validated = $request->validated();
      $library_pass = LibraryPass::where('barcode', $request->bearerToken())->first();
      $user = User::where('id', $library_pass->user_id)->first();

      $title = $validated['title'];
      $description = $validated['description'];
      $ISBN = $validated['ISBN'];
      $images = $validated['images'];

      $item = Item::create([
        'name' => $title,
        'description' => $description,
        'ISBN' => $ISBN,
        'author_id' => 1,
        'identifier' => $this->generateItemIdentifier(),
        'type' => ItemTypes::book,
        'modified_user' => $user->id,
        'modified_kind' => ModifiedEnum::inserted,
      ]);

      foreach ($images as $image) {
        // store image in storage
        $what = $image->storeAs('public/images/', $image->getClientOriginalName());

        ItemImage::create([
          'item_id' => $item->id,
          'filename' => $image->getClientOriginalName(),
          'path' => $what,
          'modified_user' => $user->id,
          'modified_kind' => ModifiedEnum::inserted,
        ]);
      }

      return $this->CommonResponse(
        ResponseStatus::success,
        'Item created',
        $this->ReturnFullItem($item)
      );
    }
}
