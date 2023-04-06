<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Employee;
use App\Models\Country;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $pk = Country::where('country_code','PK')->withCount('employees')->first();
        $af = Country::where('country_code','AF')->withCount('employees')->first();
        return [
            Card::make('All Employess', Employee::all()->count()),
            Card::make($pk->name. ' Employees', $pk->employees_count),
            Card::make($af->name. ' Employees', $af->employees_count)
        ];
    }
}
