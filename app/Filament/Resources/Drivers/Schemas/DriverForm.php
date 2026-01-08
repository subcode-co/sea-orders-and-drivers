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
                    ->required()
                    ->maxLength(20)
                    ->regex('/^[A-Z0-9\-]+$/i'),
                TextInput::make('driver_name')
                    ->label(__('admin.driver_name'))
                    ->required()
                    ->minLength(3)
                    ->maxLength(100),
                TextInput::make('driver_location')
                    ->label(__('admin.driver_location'))
                    ->required()
                    ->minLength(3)
                    ->maxLength(100),
                TextInput::make('vehicle_model')
                    ->label(__('admin.vehicle_model'))
                    ->required()
                    ->minLength(3)
                    ->maxLength(100),
                TextInput::make('vehicle_category')
                    ->label(__('admin.vehicle_category'))
                    ->required()
                    ->minLength(3)
                    ->maxLength(100),
            ]);
    }
}
