<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\SortDirectionEnum;
use App\Enums\TaskStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskListRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => Rule::enum(TaskStatusEnum::class),
            'sort' => 'string',
            'sort_direction' => Rule::enum(SortDirectionEnum::class),
            'due_date' => 'date',
        ];
    }
}
