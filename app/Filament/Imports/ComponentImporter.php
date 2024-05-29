<?php

namespace App\Filament\Imports;

use App\Models\Component;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class ComponentImporter extends Importer
{
    protected static ?string $model = Component::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('type')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('price')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('description')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('unit')
                ->example('nama atau id brand')
                ->relationship(resolveUsing:['name','id'])
                ->rules(['required']),
            ImportColumn::make('brand')
                ->example('nama atau id brand')
                ->relationship(resolveUsing:['name','id'])
                ->rules(['required']),
            ImportColumn::make('user')
                ->example('nama atau email')
                ->relationship(resolveUsing:['name','email'])
                ->rules(['required']),
            ImportColumn::make('is_published')
                ->requiredMapping()
                ->boolean()
                ->rules(['required', 'boolean']),
        ];
    }

    public function resolveRecord(): ?Component
    {
        // return Component::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Component();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your component import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
