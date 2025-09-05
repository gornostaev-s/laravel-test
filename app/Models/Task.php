<?php

namespace App\Models;

use App\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @class Task
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $user_id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property string $due_date
 *
 * Related
 *
 * @property User $user
 */
class Task extends Model
{
    use HasFactory;
    use HasFilter;

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'description',
        'status',
        'due_date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
