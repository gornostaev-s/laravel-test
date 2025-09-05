<?php

namespace Database\Factories;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'title' => fake()->unique()->title(),
//            'description' => fake()->text(),
//            'status' => TaskStatusEnum::Pending->value,
//            'due_date' => (new \DateTimeImmutable())->format('Y-m-d H:i:s'),
        ];
    }
}
