<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {

        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Service Name')
                    ->required()

                    ->maxLength(255),
                Select::make('is_active')
                    ->label('Status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->default('active') // Mengatur default ke "Aktif"
                    ->required(),
                FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->required(),
                Textarea::make('description')
                    ->label('Description')
                    ->nullable(),


            ]);
    }
}
