<?php

namespace App\Filament\Resources\Requests;

use App\Filament\Resources\Requests\Pages\CreateRequests;
use App\Filament\Resources\Requests\Pages\ViewRequest;
use App\Filament\Resources\Requests\Pages\EditRequests;
use App\Filament\Resources\Requests\Pages\ListRequests;
use App\Filament\Resources\Requests\Schemas\RequestsForm;
use App\Filament\Resources\Requests\Tables\RequestsTable;
use App\Models\Request;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RequestsResource extends Resource
{
    protected static ?string $model = Request::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Inbox;

    public static function getNavigationLabel(): string
    {
        return __('admin.requests');
    }

    public static function getModelLabel(): string
    {
        return __('admin.requests');
    }

    public static function getPluralModelLabel(): string
    {
        return __('admin.requests');
    }
    public static function getNavigationGroup(): string
    {
        return __('admin.requests');
    }

    public static function form(Schema $schema): Schema
    {
        return RequestsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RequestsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRequests::route('/'),
            'create' => CreateRequests::route('/create'),
            'view' => ViewRequest::route('/{record}'),
            'edit' => EditRequests::route('/{record}/edit'),
        ];
    }
}
