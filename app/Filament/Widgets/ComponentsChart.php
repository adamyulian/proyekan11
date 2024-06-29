<?php

namespace App\Filament\Widgets;

use App\Models\Component;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class ComponentsChart extends ChartWidget
{
    protected static ?string $heading = 'Components Chart';

    protected static ?int $sort = 3;

    public function getDescription(): ?string
    {
        return 'The number of components created.';
    }

    protected function getData(): array
    {
        $data = Trend::model(Component::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Components created',
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
