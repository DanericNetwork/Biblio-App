<?php

namespace App\Traits;

use App\Enums\ResponseStatus;
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
    public function CommonResponse(ResponseStatus $status, string $message, array|null $data): JsonResponse
    {
        return response()->json([
            'status' => $status->label(),
            'message' => $message,
            'data' => $data
        ], $status->getStatusCode());
    }
}
