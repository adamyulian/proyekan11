<?php

namespace App\Filament\Exports;

use App\Models\Subtask;
use App\Models\SubtaskComponent;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Models\Export;

class SubtaskExporter extends Exporter
{
    protected static ?string $model = Subtask::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('name'),
            ExportColumn::make('unit.name'),
            ExportColumn::make('description'),
            ExportColumn::make('is_published'),
            ExportColumn::make('user.name'),
            ExportColumn::make('price')
            ->state(function (SubTask $record): float {
                return SubtaskComponent::where('subtask_id', $record->id)
                    ->get()
                    ->sum(fn($rincian) => $rincian->coeff * $rincian->component->price);
                })
            ->prefix('Rp. ')
            ->label('Planned Price'),
            ExportColumn::make('deleted_at'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your subtask export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
