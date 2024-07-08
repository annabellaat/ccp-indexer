<?php

namespace App\Filament\Admin\Resources\BannerResource\Pages;

use App\Filament\Admin\Resources\BannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBanners extends ManageRecords
{
    protected static string $resource = BannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
