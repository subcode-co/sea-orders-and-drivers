<?php

namespace App\Filament\Resources\Requests\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class RequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tourist_name')
                    ->label(__('admin.tourist_name'))->searchable(),
                TextColumn::make('tourist_nationality')
                    ->label(__('admin.tourist_nationality'))->searchable(),
                TextColumn::make('tourist_phone')
                    ->label(__('admin.tourist_phone'))->searchable(),
                TextColumn::make('airport_name')
                    ->label(__('admin.airport_name'))->searchable(),
                TextColumn::make('arrival_time')
                    ->label(__('admin.arrival_time'))->sortable(),
                TextColumn::make('departure_time')
                    ->label(__('admin.departure_time'))->sortable(),
                TextColumn::make('total_price')
                    ->money('USD')
                    ->color('success')
                    ->sortable()
                    ->label(__('admin.total_price')),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
