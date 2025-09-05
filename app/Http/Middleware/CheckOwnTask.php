<?php

namespace App\Http\Middleware;

use App\Models\Task;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckOwnTask
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Task $task */
        $task = $request->route('task'); // Предполагается, что сущность передается в маршруте

        if (Auth::id() !== $task->user_id) {
            abort(403, 'У вас нет прав на просмотр этой сущности.');
        }

        return $next($request);
    }
}
