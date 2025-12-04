<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KotaResource\Pages;
use App\Models\Kota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KotaResource extends Resource
{
    protected static ?string $model = Kota::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kota')->required(),
                Forms\Components\TextInput::make('provinsi')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kota')->searchable(),
                Tables\Columns\TextColumn::make('provinsi')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKotas::route('/'),
            'create' => Pages\CreateKota::route('/create'),
            'edit' => Pages\EditKota::route('/{record}/edit'),
        ];
    }
}
