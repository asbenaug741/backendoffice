<?php

namespace App\Filament\Resources\OfficeSpaces\Pages;

use App\Filament\Resources\OfficeSpaces\OfficeSpaceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOfficeSpace extends EditRecord
{
    protected static string $resource = OfficeSpaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
