<?php

namespace App\Filament\Resources\CategoriResource\Pages;

use App\Filament\Resources\CategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategori extends EditRecord
{
    protected static string $resource = CategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
