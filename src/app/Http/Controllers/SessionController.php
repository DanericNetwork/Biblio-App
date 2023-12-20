<?php

namespace App\Http\Controllers;

use App\Enums\ResponseStatus;
use App\Http\Requests\LibraryPassRequest;
use App\Models\LibraryPass;
use App\Models\User;
use App\Traits\CommonTrait;

class SessionController extends Controller
{
    use CommonTrait;
    public function auth(LibraryPassRequest $request)
    {
        $code = $request->validated()['code'];

        if (!isset($code)) {
            return $this->CommonResponse(
                ResponseStatus::validationError,
                'Code is required',
                null,
            );
        }

        $pass = LibraryPass::where('barcode', $code)->first();

        if (!isset($pass)) {
            return $this->CommonResponse(
                ResponseStatus::unauthorized,
                'Incorrect code',
                null,
            );
        }

        $user = User::find($pass->user_id);

        if (!isset($user)) {
            return $this->CommonResponse(
                ResponseStatus::unauthorized,
                'Incorrect code',
                null,
            );
        }

        Auth()->login($user);

        return $this->CommonResponse(
            ResponseStatus::success,
            'User logged in current session',
            ['user' => $user],
        );
    }
}
