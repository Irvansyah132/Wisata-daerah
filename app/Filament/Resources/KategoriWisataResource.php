<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriWisataResource\Pages;
use App\Models\KategoriWisata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KategoriWisataResource extends Resource
{
    protected static ?string $model = KategoriWisata::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_kategori')
                ->required()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama_kategori')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
        ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoriWisatas::route('/'),
            'create' => Pages\CreateKategoriWisata::route('/create'),
            'edit' => Pages\EditKategoriWisata::route('/{record}/edit'),
        ];
    }
}
