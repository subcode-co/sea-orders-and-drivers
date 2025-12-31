<?php

namespace App\Filament\Resources\Drivers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
class DriversTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('license_plate')
                    ->label(__('admin.license_plate'))->searchable(),
                TextColumn::make('driver_name')
                    ->label(__('admin.driver_name'))->searchable(),
                TextColumn::make('driver_location')
                    ->label(__('admin.driver_location'))->searchable(),
                TextColumn::make('vehicle_model')
                    ->label(__('admin.vehicle_model'))->searchable(),
                TextColumn::make('vehicle_category')
                    ->label(__('admin.vehicle_category'))->searchable()
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
