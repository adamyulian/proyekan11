<?php

namespace App\Filament\Resources\SubtaskResource\Pages;

use App\Filament\Resources\SubtaskResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSubtask extends ViewRecord
{
    protected static string $resource = SubtaskResource::class;

    protected function getHeaderActions(): array
    {

        return [
            Actions\EditAction::make(),
        ];
    }
}
