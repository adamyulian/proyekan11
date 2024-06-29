<?php

namespace App\Filament\Widgets;

use App\Models\Subtask;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class SubtasksChart extends ChartWidget
{
    protected static ?string $heading = 'Subtasks Chart';

    protected static ?int $sort = 4;

    public function getDescription(): ?string
    {
        return 'The number of subtasks created.';
    }

    protected function getData(): array
    {
        $data = Trend::model(Subtask::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Subtasks created',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
