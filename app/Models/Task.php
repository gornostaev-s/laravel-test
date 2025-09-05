<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
