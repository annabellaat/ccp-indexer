<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Request;
use Filament\Support\Enums\IconPosition;

class RequestWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Requests', Request::where('status', 'New')->count())
                ->description('New requests submitted by users')
                ->descriptionIcon('heroicon-m-clipboard', IconPosition::Before),
            Stat::make('Processed Requests', Request::where('status', 'Processed')->count())
                ->description('Requests currently in processing')
                ->descriptionIcon('heroicon-m-clipboard-document-list', IconPosition::Before)
                ->color('warning'),
            Stat::make('Finished Requests', Request::where('status', 'Finished')->count())
                ->description('Finished Requests')
                ->descriptionIcon('heroicon-m-clipboard-document-check', IconPosition::Before)
                ->color('success'),
        ];
    }
}
