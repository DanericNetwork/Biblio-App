<?php

namespace App\Models;

use App\Enums\ModifiedEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LibraryPass extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function User(): ?BelongsTo
    {
      $belongsTo = $this->belongsTo(User::class);
      $user = $belongsTo->first();
      if ($user->modified_kind == ModifiedEnum::deleted) {
        return null;
      }
      return $belongsTo;
    }
}
