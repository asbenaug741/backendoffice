<?php

namespace App\Filament\Resources\BookingTransactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BookingTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),

                TextInput::make('phone_number')
                    ->label('Phone Number')
                    ->numeric(),

                TextInput::make('booking_trx_id')
                    ->maxLength(255)
                    ->required(),

                TextInput::make('total_amount')
                    ->required()
                    ->numeric()
                    ->prefix('IDR'),

                TextInput::make('duration')
                    ->required()
                    ->numeric()
                    ->prefix('Days'),

                Select::make('is_paid')
                    ->options([
                        true => 'Paid',
                        false => 'Not Paid'
                    ])
                    ->required(),

                DatePicker::make('started_at')
                    ->required(),

                DatePicker::make('ended_at')
                    ->required(),

                Select::make('office_space_id')
                    ->relationship('OfficeSpace', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

            ]);
    }
}
