<?php

namespace App\Filament\Resources\SubtaskResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Enums\IconPosition;
use App\Filament\Resources\SubtaskResource;

class ViewSubtask extends ViewRecord
{
    protected static string $resource = SubtaskResource::class;

    protected function getHeaderActions(): array
    {

        return [
            Actions\EditAction::make(),
            Action::make('print')
            ->icon('heroicon-m-printer')
            ->url(fn ($record): string => route('generate-pdf', ['subtask' => $record->id]))
            ->iconPosition(IconPosition::After)
            ,
        ];
    }
}
