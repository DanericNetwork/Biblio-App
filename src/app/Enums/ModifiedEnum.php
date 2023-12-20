<?php

namespace App\Enums;

enum ModifiedEnum: string
{
    case inserted = 'I';
    case modified = 'M';
    case deleted = 'D';
}
