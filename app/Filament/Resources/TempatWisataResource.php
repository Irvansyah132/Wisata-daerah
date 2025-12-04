<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TempatWisataResource\Pages;
use App\Models\TempatWisata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TempatWisataResource extends Resource
{
    protected static ?string $model = TempatWisata::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_tempat')->required(),

                Forms\Components\Textarea::make('deskripsi')->required(),

                Forms\Components\Select::make('kategori_id')
                    ->relationship('kategori', 'nama_kategori')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('kota_id')
                    ->relationship('kota', 'nama_kota')
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_tempat')->searchable(),

                Tables\Columns\TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kota.nama_kota')
                    ->label('Kota')
                    ->sortable(),

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
            'index' => Pages\ListTempatWisatas::route('/'),
            'create' => Pages\CreateTempatWisata::route('/create'),
            'edit' => Pages\EditTempatWisata::route('/{record}/edit'),
        ];
    }
}
