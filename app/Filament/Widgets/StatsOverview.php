<?php

namespace App\Filament\Widgets;

use App\Models\Brand;
use App\Models\Task;
use App\Models\Subtask;
use App\Models\Component;
use App\Models\Post;
use App\Models\Unit;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Component', Component::count())
            ->description('Increase Component Created')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Stat::make('Total Subtask', Subtask::count())
            ->description('Increase Subtask Created')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('danger'),
            Stat::make('Total Task', Task::count())
            ->description('Increase Task Created')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('info'),
            Stat::make('Total Unit', Unit::count())
            ->description('Increase Unit Created')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('info'),
            Stat::make('Total Brand', Brand::count())
            ->description('Increase Brand Created')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('info'),
            Stat::make('Total Post', Post::count())
            ->description('Increase Post Created')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('info'),
        ];
    }
}
