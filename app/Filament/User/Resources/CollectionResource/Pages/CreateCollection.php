<?php

namespace App\Filament\User\Resources\CollectionResource\Pages;

use App\Filament\User\Resources\CollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCollection extends CreateRecord
{
    protected static string $resource = CollectionResource::class;
}
