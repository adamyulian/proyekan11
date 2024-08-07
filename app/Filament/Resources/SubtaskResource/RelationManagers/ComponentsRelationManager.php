<?php

namespace App\Filament\Resources\SubtaskResource\RelationManagers;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Component;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Actions\AttachAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ComponentsRelationManager extends RelationManager
{
    protected static string $relationship = 'components';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
               //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->striped()
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->description(fn (Component $record): string => $record->type),
                Tables\Columns\TextColumn::make('coeff'),
                Tables\Columns\TextColumn::make('price')
                ->label('Component Price'),
                Tables\Columns\TextColumn::make('Total')
                ->state(function (Component $record): float {
                    return $record->price * $record->pivot->coeff;
                })
                ->prefix('Rp. ')
                ->numeric(2)
                ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                ->label('Tambah Component')
                ->preloadRecordSelect()
                ->recordSelectOptionsQuery(function (Builder $query) {
                    $userId = Auth::user()->id;
                    $adminId = 1; // ID admin

                    if ($userId == $adminId) {
                        // Jika user adalah admin, jangan filter apa pun
                        return;
                    } else {
                        // Jika bukan admin, filter berdasarkan user_id atau admin_id
                        $query->where(function ($query) use ($userId, $adminId) {
                            $query->where('user_id', $userId)
                                ->orWhere('user_id', $adminId);
                        });
                    }
                })
                ->form(fn (AttachAction $action): array => [
                    $action->getRecordSelect(),
                    Forms\Components\TextInput::make('coeff')
                                                ->numeric()
                                                ->label('Coeff : gunakan tanda (.) untuk koma')
                                                ->required(),
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
            ->heading('Rincian Sub Task');
    }
}
