<?php

namespace App\Traits;

use App\Enums\ResponseStatus;
use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait CommonTrait {

    /**
     * Common response
     *
     * @param ResponseStatus $status response status
     * @param string $message response message
     * @param array|null $data response data
     * @param int $code http status code
     * @return JsonResponse response formatted in json
     */
    public function CommonResponse(ResponseStatus $status, string $message, mixed $data): JsonResponse
    {
        return response()->json([
            'status' => $status->label(),
            'message' => $message,
            'data' => $data
        ], $status->getStatusCode());
    }

    public function ReturnFullItem(Item $item)
    {
      $author = $item->author;
      $category = $item->category;
      $age_rating = $item->ageRating;
      $images = $item->images;

      $item->author = $author;
      $item->category = $category;
      $item->age_rating = $age_rating;
      $item->images = $images;


      return $item;
    }

    public function ReturnMultipleFullItems($items) {
      $fullItems = [];

      foreach ($items as $item) {
        $fullItems[] = $this->ReturnFullItem($item);
      }

      return $fullItems;
    }
}
