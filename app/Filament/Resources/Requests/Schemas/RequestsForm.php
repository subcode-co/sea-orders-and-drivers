<?php

namespace App\Filament\Resources\Requests\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\DatePicker;

class RequestsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('tabs')
                    ->tabs([
                        Tab::make('tourist_info')
                            ->label(__('admin.tourist_info'))
                            ->schema([
                                TextInput::make('tourist_name')
                                    ->label(__('admin.tourist_name'))
                                    ->nullable(),
                                TextInput::make('tourist_nationality')
                                    ->label(__('admin.tourist_nationality'))
                                    ->nullable(),
                                TextInput::make('tourist_phone')
                                    ->label(__('admin.tourist_phone'))
                                    ->nullable()
                                    ->tel()
                                    ->maxLength(20)
                                    ->numeric(),
                                FileUpload::make('image')
                                    ->label(__('admin.personal_image'))
                                    ->nullable(),
                            ])->columns(2)->columnSpanFull(),

                        Tab::make('trip_info')
                            ->label(__('admin.trip_info'))
                            ->schema([
                                TextInput::make('airport_name')
                                    ->label(__('admin.airport_name'))
                                    ->nullable(),
                                DateTimePicker::make('arrival_time')
                                    ->label(__('admin.arrival_time'))
                                    ->nullable(),
                                DateTimePicker::make('departure_time')
                                    ->label(__('admin.departure_time'))
                                    ->nullable()
                                    ->after('arrival_time'),
                                Select::make('driver_id')
                                ->label(__('admin.driver'))
                                ->relationship('driver', 'driver_name')
                                ->required(),
                        ]),
                        Tab::make('trip_plan_details')->label(__('admin.trip_plan_details'))
                            ->schema([
                                Repeater::make('trip_plan_details')
                                    ->label(__('admin.trip_plan_details'))
                                    ->schema([
                                        DatePicker::make('date')
                                            ->label(__('admin.date'))
                                            ->nullable(),
                                        TextInput::make('type')
                                            ->label(__('admin.type'))
                                            ->nullable(),
                                        TextInput::make('trip')
                                            ->label(__('admin.trip'))
                                            ->nullable(),
                                        TextInput::make('cost')
                                            ->label(__('admin.cost'))
                                            ->nullable()
                                            ->numeric()
                                            ->minValue(0),
                                        TextInput::make('notes')
                                            ->label(__('admin.notes'))
                                            ->nullable()
                                            ->maxLength(500),
                                    ])->columns(2)->columnSpanFull(),
                            ])->columns(2)->columnSpanFull(),
                ])->columns(2)->columnSpanFull(),
            ]);
    }
}
