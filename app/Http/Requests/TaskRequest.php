<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\TaskStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return match ($this->getMethod()) {
            'POST' => [
                'title' => 'required|min:3',
                'status' => Rule::enum(TaskStatusEnum::class),
            ],
            'PUT' => [
                'title' => 'string|min:3',
                'status' => Rule::enum(TaskStatusEnum::class),
            ],
            'DELETE' => [
                ''
            ],
        };
    }
}
