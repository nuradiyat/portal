<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            
            Stat::make('Total Comment', Comment::whereNotNull('id')->count())
                ->description('Comment')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Total Artikel', Article::count())
                ->description('Artikel')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total User', User::count())
                ->description('User')
                ->descriptionIcon('heroicon-m-user')
                ->color('success'),

        ];
    }
}
