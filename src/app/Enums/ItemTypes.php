<?php

namespace App\Enums;

enum ItemTypes: string
{
    case book = 'book';
    case movie = 'movie';
    case game = 'game';
    case music = 'music';
    case ebook = 'ebook';
    case audiobook = 'audiobook';
    case magazine = 'magazine';

    public function label(): string
    {
        return match ($this) {
            static::book => 'Book',
            static::movie => 'Movie',
            static::game => 'Game',
            static::music => 'Music',
            static::ebook => 'Ebook',
            static::audiobook => 'Audiobook',
            static::magazine => 'Magazine',
        };
    }

    public function internal(): string
    {
        $match = match ($this) {
            static::book => 'book',
            static::movie => 'movie',
            static::game => 'game',
            static::music => 'music',
            static::ebook => 'ebook',
            static::audiobook => 'audiobook',
            static::magazine => 'magazine',
        };

        return strtoupper($match);
    }
}
