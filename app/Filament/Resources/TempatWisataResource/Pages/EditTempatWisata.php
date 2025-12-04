<?php

namespace App\Filament\Resources\TempatWisataResource\Pages;

use App\Filament\Resources\TempatWisataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTempatWisata extends EditRecord
{
    protected static string $resource = TempatWisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
