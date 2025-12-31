<?php

namespace App\Filament\Resources\Drivers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class DriverForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('license_plate')
                    ->label(__('admin.license_plate'))
                    ->required(),
                TextInput::make('driver_name')
                    ->label(__('admin.driver_name'))
                    ->required(),
                TextInput::make('driver_location')
                    ->label(__('admin.driver_location'))
                    ->required(),
                TextInput::make('vehicle_model')
                    ->label(__('admin.vehicle_model'))
                    ->required(),
                TextInput::make('vehicle_category')
                    ->label(__('admin.vehicle_category'))
                    ->required(),
            ]);
    }
}
