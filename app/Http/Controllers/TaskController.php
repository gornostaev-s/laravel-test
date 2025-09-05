<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Filters\TaskFilter;
use App\Http\Requests\TaskListRequest;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct(
        private readonly TaskService $taskService,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(TaskFilter $filter): \Illuminate\Support\Collection
    {
        return Task::filter($filter)
            ->with('user')
            ->where(['user_id' => Auth::id()])
            ->get()
            ->map(function (Task $task) {
            return new TaskResource($task);
        });
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskCreateRequest $taskRequest): TaskResource
    {
        $task = $this->taskService->create($taskRequest);

        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(TaskUpdateRequest $taskRequest, Task $task): TaskResource
    {
        $task = $this->taskService->update($taskRequest, $task);

        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): bool
    {
        return $this->taskService->destroy($task);
    }
}
