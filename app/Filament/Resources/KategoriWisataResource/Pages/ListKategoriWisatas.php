<?php

namespace App\Filament\Resources\KategoriWisataResource\Pages;

use App\Filament\Resources\KategoriWisataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriWisatas extends ListRecords
{
    protected static string $resource = KategoriWisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
