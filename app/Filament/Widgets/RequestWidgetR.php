<?php

namespace App\Filament\Widgets;

use App\Filament\Admin\Resources\RequestResource;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Request;
use Filament\Support\Enums\IconPosition;

class RequestWidgetR extends BaseWidget
{
    protected static ?int $sort = 0;
    protected function getStats(): array
    {
        return [
            Stat::make('New Requests', Request::where('status', 'New')->count())
                ->description('New requests submitted by users')
                ->descriptionIcon('heroicon-m-clipboard', IconPosition::Before)
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => "\$dispatch('filterUpdate', {filter: ['New'] })"
                ])
                ->color('info'),
            Stat::make('Processed Requests', Request::where('status', 'Material Available')->orWhere('status', 'IPR Cleared')->orWhere('status', 'Paid')->count())
                ->description('Requests currently in processing')
                ->descriptionIcon('heroicon-m-clipboard-document-list', IconPosition::Before)
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => "\$dispatch('filterUpdate', { filter: ['Material Available', 'IPR Cleared', 'Paid'] })",
                ])
                ->color('warning'),
            Stat::make('Finished Requests', Request::where('status', 'Closed - Material Sent')->orWhere('status', 'Closed - Disapproved')->count())
                ->description('Finished Requests')
                ->descriptionIcon('heroicon-m-clipboard-document-check', IconPosition::Before)
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => "\$dispatch('filterUpdate', { filter: ['Closed - Material Sent', 'Closed - Disapproved'] })",
                ])
                ->color('success'),
        ];
    }
}
