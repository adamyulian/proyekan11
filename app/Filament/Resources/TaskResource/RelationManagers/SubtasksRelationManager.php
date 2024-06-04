<?php

namespace App\Filament\Resources\TaskResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Subtask;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SubtaskComponent;
use App\Models\TaskSubtask;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class SubtasksRelationManager extends RelationManager
{
    protected static string $relationship = 'subtasks';

    public function form(Form $form): Form
    {
        return $form
            //
            ;
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('coeff'),
                Tables\Columns\TextColumn::make('price')
                ->state(function (SubTask $record): float {
                    return SubtaskComponent::where('subtask_id', $record->id)
                        ->get()
                        ->sum(fn($rincian) => $rincian->coeff * $rincian->component->price);
                    })
                ->prefix('Rp. ')
                ->numeric(2)
                ->label('Planned Price'),
                Tables\Columns\TextColumn::make('Total')
                //
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
