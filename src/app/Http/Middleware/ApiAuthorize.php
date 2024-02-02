<?php

namespace App\Http\Middleware;

use App\Enums\ModifiedEnum;
use App\Enums\ResponseStatus;
use App\Models\LibraryPass;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Traits\CommonTrait;

class ApiAuthorize
{
  use CommonTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      // get bearer token
      $pass = $request->bearerToken();

      if (!isset($pass)) {
        return $this->CommonResponse(ResponseStatus::unauthorized, 'Unauthorized. Missing library pass.', null);
      }

      $lib_pass = LibraryPass::where('barcode', $pass)
        ->where('modified_kind', '!=', ModifiedEnum::deleted)->first();

      if (!isset($lib_pass)) {
        return $this->CommonResponse(ResponseStatus::unauthorized, 'Unauthorized. Invalid library pass.', null);
      }

      $user = $lib_pass->user;

      if (!isset($user)) {
        return $this->CommonResponse(ResponseStatus::unauthorized, 'Unauthorized. Invalid library pass.', null);
      }

      return $next($request);
    }
}
