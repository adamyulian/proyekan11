<?php

namespace App\Filament\Resources\DefbrandResource\Pages;

use App\Filament\Resources\DefbrandResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDefbrands extends ManageRecords
{
    protected static string $resource = DefbrandResource::class;

    protected ?string $heading = 'Default Brands';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
