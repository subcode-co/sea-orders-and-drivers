<?php

namespace App\Filament\Resources\Requests\Pages;

use App\Filament\Resources\Requests\RequestsResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class ViewRequest extends ViewRecord
{
    protected static string $resource = RequestsResource::class;

    public function infolist(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make(__('admin.tourist_info'))
                ->schema([
                    TextEntry::make('tourist_name')->label(__('admin.tourist_name')),
                    TextEntry::make('tourist_nationality')->label(__('admin.tourist_nationality')),
                    TextEntry::make('tourist_phone')->label(__('admin.tourist_phone')),
                    ImageEntry::make('image')->label(__('admin.personal_image')),
                ])
                ->columns(2)->columnSpanFull(),

            Section::make(__('admin.trip_info'))
                ->schema([
                    TextEntry::make('airport_name')->label(__('admin.airport_name')),
                    TextEntry::make('arrival_time')->label(__('admin.arrival_time')),
                    TextEntry::make('departure_time')->label(__('admin.departure_time')),
                    TextEntry::make('driver.driver_name')->label(__('admin.driver')),
                ])
                ->columns(2)->columnSpanFull(),

            Section::make(__('admin.trip_plan_details'))
                ->schema([
                    RepeatableEntry::make('trip_plan_details')
                    ->label(__('admin.trip_plan_details'))
                        ->schema([
                            TextEntry::make('date')->label(__('admin.date')),
                            TextEntry::make('type')->label(__('admin.type')),
                            TextEntry::make('trip')->label(__('admin.trip')),
                            TextEntry::make('cost')->label(__('admin.cost'))->money('USD'),
                            TextEntry::make('notes')->label(__('admin.notes')),
                        ])
                        ->columns(2),
                        TextEntry::make('total_price')
                        ->label(__('admin.total_price'))
                        ->money('USD')
                        ->weight('bold')
                        ->size('lg')
                        ->color('success'),
                    ])->columnSpanFull(),
        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
        EditAction::make(),
        DeleteAction::make(),
    ];
}



}
