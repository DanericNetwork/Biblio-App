<?php

namespace App\Enums;

enum ResponseStatus: string
{
    case success = 'success';
    case error = 'error';
    case unauthorized = 'unauthorized';
    case forbidden = 'forbidden';
    case notFound = 'not_found';
    case validationError = 'validation_error';
    case internalServerError = 'internal_server_error';

    public function getStatusCode(): int
    {
        return match ($this) {
            static::success => 200,
            static::error => 400,
            static::unauthorized => 401,
            static::forbidden => 403,
            static::notFound => 404,
            static::validationError => 422,
            static::internalServerError => 500,
        };
    }

    public function label(): string
    {
        return match ($this) {
            static::success => 'Success',
            static::error => 'Error',
            static::unauthorized => 'Unauthorized',
            static::forbidden => 'Forbidden',
            static::notFound => 'Not Found',
            static::validationError => 'Validation Error',
            static::internalServerError => 'Internal Server Error',
        };
    }
}
