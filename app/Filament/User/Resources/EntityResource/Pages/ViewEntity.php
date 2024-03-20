<?php

namespace App\Filament\User\Resources\EntityResource\Pages;

use App\Filament\User\Resources\EntityResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEntity extends ViewRecord
{
    protected static string $resource = EntityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
