<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Task;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TaskResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Filament\Resources\TaskResource\RelationManagers\SubtasksRelationManager;
use App\Models\TaskSubtask;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->required(),
                    Forms\Components\Select::make('unit_id')
                    ->required()
                    ->searchable()
                    ->native(false)
                    ->preload()
                    ->relationship(
                        name: 'unit',
                        titleAttribute: 'name',
                        modifyQueryUsing: function (Builder $query) {
                            $user = Auth::user();
                            if ($user->name !== 'admin') { // Assuming 'role' is an attribute that indicates if the user is an admin
                                $query->where('user_id', $user->id)->pluck('id','name')->orderBy('created_at');
                            }
                        }
                        )
                    ->createOptionForm([
                            // $userId = Auth::user()->id,
                            Forms\Components\TextInput::make(name:'name')
                            ->required(),
                            Forms\Components\TextInput::make(name:'description')
                            ->required(),
                            Forms\Components\Toggle::make('is_published')->label('Is Published?'),
                            Forms\Components\TextInput::make(name:'user_id')
                            ->default(Auth::user()->id)
                            ->required()
                            ->disabled()
                            ]),
                Forms\Components\Toggle::make('is_published')
                    ->required(),

                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
                    ->disabled(auth()->user()->name !== 'admin')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('price')
                        ->state(function (\App\Models\Task $record): float {
                            // Ambil semua subtasks yang memiliki task_id yang sama beserta komponennya
                            $subtasks = $record->subtasks()->with('components')->get();

                            // Hitung total sum dari hasil perkalian antara harga subtask dengan coeff dari pivot table task_subtask
                            $total = 0;
                            foreach ($subtasks as $subtask) {
                                $taskSubtaskCoeff = $subtask->pivot->coeff;
                                $subtotal = $subtask->components
                                    ->sum(fn($component) => $component->pivot->coeff * $component->price);
                                $total += $subtotal * $taskSubtaskCoeff;
                            }

                            return $total;
                        })
                    ->prefix('Rp. ')
                    ->numeric(2)
                    ->label('Planned Price'),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
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
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            SubtasksRelationManager::class
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'view' => Pages\ViewTask::route('/{record}'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
