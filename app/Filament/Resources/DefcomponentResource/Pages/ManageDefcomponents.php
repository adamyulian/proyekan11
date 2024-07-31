<?php

namespace App\Filament\Resources\DefcomponentResource\Pages;

use App\Filament\Resources\DefcomponentResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDefcomponents extends ManageRecords
{
    protected static string $resource = DefcomponentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
