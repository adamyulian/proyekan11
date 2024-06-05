<?php

namespace App\Filament\Resources\TaskResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Subtask;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\TaskSubtask;
use App\Models\SubtaskComponent;
use Filament\Tables\Actions\AttachAction;
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
                ->label('Subtask Price'),
                Tables\Columns\TextColumn::make('Total')
                ->state(function (SubTask $record): float {
                    $plannedPrice = SubtaskComponent::where('subtask_id', $record->id)
                        ->get()
                        ->sum(fn($rincian) => $rincian->coeff * $rincian->component->price);
                    return $record->coeff * $plannedPrice;
                })
                ->prefix('Rp. ')
                ->numeric(2)
                ->label('Total'),
                //
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                ->label('Tambah Subtask')
                ->preloadRecordSelect()
                ->form(fn (AttachAction $action): array => [
                    $action->getRecordSelect(),
                    Forms\Components\TextInput::make('coeff')->required(),
                ])
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]))
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->groups([
                Tables\Grouping\Group::make('type')
                    ->titlePrefixedWithLabel(false),
            ])
            ->heading('Rincian Task');
    }
}
