<?php

declare(strict_types=1);

namespace App\Filters;

use App\Enums\SortDirectionEnum;
use Exception;
use Illuminate\Database\Eloquent\Builder;

class TaskFilter extends Filter
{
    /**
     * Фильтрация по статусу
     *
     * @param string $value
     * @return Builder
     */
    protected function status(string $value): Builder
    {
        return $this->builder->where(['status' => $value]);
    }

    /**
     * Сортировка
     *
     * @param string $value
     * @return Builder
     */
    protected function sort(string $value): Builder
    {
        $direction = $this->request->get('sort_direction');

        return $this->builder->orderBy("$value", $direction ?? SortDirectionEnum::DESC->value);
    }

    /**
     * Фильтр по дедлайну
     *
     * @param string $value
     * @return Builder
     * @throws Exception
     */
    protected function dueDate(string $value): Builder
    {
        $date = new \DateTimeImmutable($value);

        return $this->builder->whereBetween('due_date', [$date->format('Y-m-d 00:00:00'), $date->format('Y-m-d 23:59:59')]);
    }
}
