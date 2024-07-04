<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Component;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use App\Filament\Exports\UnitExporter;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\ComponentExporter;
use App\Filament\Imports\ComponentImporter;
use App\Filament\Resources\ComponentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ComponentResource\RelationManagers;

class ComponentResource extends Resource
{
    protected static ?string $model = Component::class;

    protected static ?string $navigationGroup = 'Perencanaan';

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Select::make('type')
                    ->required()
                    ->native(false)
                    ->options([
                        'Tenaga Kerja' => 'Tenaga Kerja',
                        'Bahan' => 'Bahan',
                        'Peralatan' => 'Peralatan',
                    ]),
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
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp.'),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('brand_id')
                    ->required()
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->relationship(
                        name: 'brand',
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
                        Forms\Components\TextInput::make('name')
                        ->required(),
                        Forms\Components\TextInput::make('website_url')
                            ->required(),
                        Forms\Components\TextInput::make('industry')
                            ->required(),
                        Forms\Components\Toggle::make('is_published')
                            ->required(),
                        Forms\Components\Select::make('user_id')
                            ->label('User')
                            ->options(User::all()->pluck('name', 'id'))
                            ->searchable()
                            ->disabled(auth()->user()->name !== 'admin')
                            ->columnSpanFull()]),
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
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->prefix('Rp. ')
                    ->numeric(2)
                    ->sortable(),
                Tables\Columns\TextColumn::make('unit.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->numeric()
                    ->sortable(),
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
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(ComponentExporter::class),
                ImportAction::make()
                    ->importer(ComponentImporter ::class)
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComponents::route('/'),
            'create' => Pages\CreateComponent::route('/create'),
            'view' => Pages\ViewComponent::route('/{record}'),
            'edit' => Pages\EditComponent::route('/{record}/edit'),
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
