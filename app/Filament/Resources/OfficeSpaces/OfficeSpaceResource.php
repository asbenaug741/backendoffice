<?php

namespace App\Filament\Resources\OfficeSpaces;

use App\Filament\Resources\OfficeSpaces\Pages\CreateOfficeSpace;
use App\Filament\Resources\OfficeSpaces\Pages\EditOfficeSpace;
use App\Filament\Resources\OfficeSpaces\Pages\ListOfficeSpaces;
use App\Filament\Resources\OfficeSpaces\Schemas\OfficeSpaceForm;
use App\Filament\Resources\OfficeSpaces\Tables\OfficeSpacesTable;
use App\Models\OfficeSpace;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OfficeSpaceResource extends Resource
{
    protected static ?string $model = OfficeSpace::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $recordTitleAttribute = 'OfficeSpace';

    public static function form(Schema $schema): Schema
    {
        return OfficeSpaceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OfficeSpacesTable::configure($table);
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
            'index' => ListOfficeSpaces::route('/'),
            'create' => CreateOfficeSpace::route('/create'),
            'edit' => EditOfficeSpace::route('/{record}/edit'),
        ];
    }
}
