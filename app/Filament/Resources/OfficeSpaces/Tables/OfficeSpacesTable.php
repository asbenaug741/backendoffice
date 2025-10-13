<?php

namespace App\Filament\Resources\OfficeSpaces\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OfficeSpacesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Office'),
                ImageColumn::make('thumbnail'),
                TextColumn::make('city.name'),
                IconColumn::make('is_full_booked')
                    ->boolean()
                    ->truecolor('danger')
                    ->falsecolor('success')
                    ->trueIcon('heroicon-o-x-circle')
                    ->falseIcon('heroicon-o-check-circle'),
            ])
            ->filters([
                SelectFilter::make('city_id')
                    ->relationship('city', 'name')
                    ->label('City')
                    ->searchable()
                    ->preload()
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
