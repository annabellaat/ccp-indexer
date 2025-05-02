<?php

namespace App\Filament\Admin\Resources\RequestResource\Pages;

use App\Filament\Admin\Resources\RequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Widgets\RequestWidgetR;

class ListRequests extends ListRecords
{
    protected static string $resource = RequestResource::class;
    
    protected $listeners = ['filterUpdate' => 'updateTableFilters']; 

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            RequestWidgetR::class,
        ];
    }

    public function updateTableFilters(array $filter): void 
    { 
        foreach($filter as $index=>$x){
            $this->tableFilters['status']['values'][$index] = $x;
        };
    } 
}
