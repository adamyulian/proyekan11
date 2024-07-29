<?php

namespace App\Filament\Resources\DefunitResource\Pages;

use App\Filament\Resources\DefunitResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDefunits extends ManageRecords
{
    protected static string $resource = DefunitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
