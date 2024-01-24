<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    protected $guarded = [];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(ItemCategory::class);
    }

    public function ageRating(): BelongsTo {
      return $this->belongsTo(ItemAgeRating::class, 'rating_id');
    }
}
