<?php

namespace App\Filament\Resources;

use App\Filament\Exports\SubtaskExporter;
use App\Filament\Imports\SubtaskImporter;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Subtask;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SubtaskComponent;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists;
use App\Filament\Resources\SubtaskResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SubtaskResource\RelationManagers;
use App\Filament\Resources\SubtaskResource\RelationManagers\ComponentsRelationManager;
use App\Models\Component;

class SubtaskResource extends Resource
{
    protected static ?string $model = Subtask::class;

    protected static ?string $navigationGroup = 'Perencanaan';

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
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
                Forms\Components\TextInput::make('description')
                    ->required(),
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
            ->modifyQueryUsing(function (Builder $query) {
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
                    ->numeric(2),
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
            ])
            ->headerActions([
                Tables\Actions\ExportAction::make()
                    ->exporter(SubtaskExporter::class),
                Tables\Actions\ImportAction::make()
                    ->importer(SubtaskImporter ::class)
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist

    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('name'),
                Infolists\Components\TextEntry::make('description'),
                Infolists\Components\TextEntry::make('user.name'),
                Infolists\Components\TextEntry::make('price')
                ->state(function (\App\Models\Subtask $record): float {
                    return $record->components
                        ->sum(fn($component) => $component->pivot->coeff * $component->price);
                    })
                ->money('IDR')
                ->label('Subtask Price')
                // Infolists\Components\TextEntry::make('Cost')
                // ->state(function (SubTask $record): float {
                //     $subtotal = 0;
                //     $detailcostsubtasks = DetailCostSubTask::select('*')->where('sub_task_id', $record->id)->get();
                //     foreach ($detailcostsubtasks as $key => $rincian){
                //         $volume = $rincian->volume;
                //         $harga_unit = $rincian->costcomponent->hargaunit;
                //         $subtotal1 = $volume * $harga_unit;
                //         $subtotal+=$subtotal1;
                //     }
                //     return $subtotal;
                // })
                // ->money('IDR')
                // ->label('Cost'),

            ]);
    }


    public static function getRelations(): array
    {
        return [
            ComponentsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubtasks::route('/'),
            'create' => Pages\CreateSubtask::route('/create'),
            'view' => Pages\ViewSubtask::route('/{record}'),
            'edit' => Pages\EditSubtask::route('/{record}/edit'),
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
