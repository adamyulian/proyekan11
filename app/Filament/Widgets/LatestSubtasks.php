<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use App\Filament\Resources\SubtaskResource;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestSubtasks extends BaseWidget
{

    protected static ?int $sort = 5;

    protected int | string | array $columnSpan = 'full' ;

    public function table(Table $table): Table
    {
        return $table
            ->query(SubtaskResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at','desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->state(function (\App\Models\Subtask $record): float {
                        return $record->components
                            ->sum(fn($component) => $component->pivot->coeff * $component->price);
                        })
                    ->prefix('Rp. ')
                    ->numeric(2)
                    ->label('Planned Price'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }
}
