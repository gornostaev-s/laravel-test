<?php

namespace App\Observers;

use App\Enums\TaskStatusEnum;
use App\Events\TaskCompleted;
use App\Models\Task;

class TaskObserver
{
    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        if ($task->isDirty('status') && $task->status === TaskStatusEnum::Done->value) {
            TaskCompleted::dispatch($task);
        }
    }
}
