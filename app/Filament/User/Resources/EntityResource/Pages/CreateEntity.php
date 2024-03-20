<?php

namespace App\Filament\User\Resources\EntityResource\Pages;

use App\Filament\User\Resources\EntityResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEntity extends CreateRecord
{
    protected static string $resource = EntityResource::class;
}
