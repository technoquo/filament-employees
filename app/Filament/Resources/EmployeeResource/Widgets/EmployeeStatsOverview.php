<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $us = Country::where('country_code', 'US')->withCount('employees')->first();
        $cr = Country::where('country_code', 'CR')->withCount('employees')->first();
        
        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make($us->name. ' Employees', $us->employees_count),
            Card::make($cr->name. ' Employees', $cr->employees_count),
        ];
    }
}
