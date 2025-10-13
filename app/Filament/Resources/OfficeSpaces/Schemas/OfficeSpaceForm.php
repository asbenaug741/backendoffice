<?php

namespace App\Filament\Resources\OfficeSpaces\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Symfony\Contracts\Service\Attribute\Required;

class OfficeSpaceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('name')
                    ->label('Office Name')
                    ->required(),

                FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->image()
                    ->required(),

                Select::make('is_open')
                    ->label('Open Status')
                    ->options([
                        true => 'Open',
                        false => 'Close',
                    ]),

                Select::make('is_full_booked')
                    ->label('Book Status')
                    ->options([
                        true => 'Available',
                        false => 'Not Available',
                    ]),

                TextInput::make('price')
                    ->label('Price')
                    ->prefix('IDR')
                    ->numeric(),

                TextInput::make('duration')
                    ->label('Duration')
                    ->prefix('Days')
                    ->numeric(),

                Select::make('is_popular')
                    ->label('Popular Status')
                    ->options([
                        true => 'Popular',
                        false => 'Not Popular',
                    ]),

                Repeater::make('photos')
                    ->relationship('photos')
                    ->schema([
                        FileUpload::make('photo')
                            ->required()
                    ]),

                Repeater::make('benefits')
                    ->relationship('benefits')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                    ]),

                TextInput::make('address')
                    ->label('Address'),

                Textarea::make('about')
                    ->label('About')
                    ->rows(10)
                    ->columns(20),

                Select::make('city_id')
                    ->relationship('city', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
