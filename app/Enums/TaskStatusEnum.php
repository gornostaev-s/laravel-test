<?php

declare(strict_types=1);

namespace App\Enums;

use Ramsey\Collection\Collection;

enum TaskStatusEnum: string
{
    case Pending = 'pending';
    case InProgress = 'in_progress';
    case Done = 'done';

    public static function implode(string $separator): string
    {
        return implode($separator, (new Collection(self::class, self::cases()))->column('value'));
    }
}
