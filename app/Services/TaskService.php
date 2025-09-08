<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    public function create(TaskCreateRequest $request): ?Task
    {
        $task = Task::factory()->make($request->validated());
        $task->user_id = Auth::id();
        $task->save();

        return $task;
    }

    public function update(TaskUpdateRequest $request, Task $task): Task
    {
        $task->fill($request->validated());
        $task->save();

        return $task;
    }

    public function destroy(Task $task): bool
    {
        return $task->delete();
    }
}
