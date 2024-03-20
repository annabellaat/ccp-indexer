<?php

namespace App\Filament\Admin\Resources\EntityResource\Pages;

use App\Filament\Imports\EntityImporter;
use App\Filament\Admin\Resources\EntityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEntities extends ListRecords
{
    protected static string $resource = EntityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ImportAction::make() 
                ->importer(EntityImporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
