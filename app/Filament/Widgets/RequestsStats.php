<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Request;
use App\Models\Driver;

class RequestsStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $requests = Request::all();

        $salesTotal = $requests->sum(fn ($request) => $request->total_price);

        $salesToday = Request::whereDate('created_at', now())
            ->get()
            ->sum(fn ($request) => $request->total_price);

        $salesThisWeek = Request::whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek(),
            ])
            ->get()
            ->sum(fn ($request) => $request->total_price);

        $salesThisMonth = Request::whereMonth('created_at', now()->month)
            ->get()
            ->sum(fn ($request) => $request->total_price);

        $mostRequestedDriver = Driver::withCount('requests')
            ->orderByDesc('requests_count')
            ->first()->driver_name;

        return [
            //all requests
            Stat::make(__('admin.requests'), Request::count())
                ->icon('heroicon-o-clipboard-document'),

            //requests today
            Stat::make(__('admin.requests_today'),
                Request::whereDate('created_at', now())->count()
            )->icon('heroicon-o-calendar-days'),

            //requests this week
            Stat::make(__('admin.requests_this_week'),
                Request::whereBetween('created_at', [
                    now()->startOfWeek(),
                    now()->endOfWeek(),
                ])->count()
            )->icon('heroicon-o-calendar-date-range'),

            //requests this month
            Stat::make(__('admin.requests_this_month'),
                Request::whereMonth('created_at', now()->month)->count()
            )->icon('heroicon-o-calendar-days'),

            //sales total
            Stat::make(__('admin.sales_total'), number_format($salesTotal, 2))
                ->icon('heroicon-o-currency-dollar'),

            //sales today
            Stat::make(__('admin.sales_today'), number_format($salesToday, 2))
                ->icon('heroicon-o-currency-dollar'),

            //sales this week
            Stat::make(__('admin.sales_this_week'), number_format($salesThisWeek, 2))
                ->icon('heroicon-o-currency-dollar'),

            //sales this month
            Stat::make(__('admin.sales_this_month'), number_format($salesThisMonth, 2))
                ->icon('heroicon-o-currency-dollar'),

            //total drivers count
            Stat::make(__('admin.drivers'), Driver::count())
                ->icon('heroicon-o-user-group'),

            //most requested driver
            Stat::make(
                __('admin.most_requested_driver'),
                $mostRequestedDriver ?? '-'
            )->icon('heroicon-o-sparkles'),
        ];
    }
}
