<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(fn () => auth()->id())
                    ->dehydrated(true),

                Section::make('Informasi Produk')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Produk')
                            ->required()
                            ->maxLength(255),

                        Select::make('category_id')
                            ->label('Kategori')
                            ->options(
                                Category::query()
                                    ->orderBy('name')
                                    ->pluck('name', 'id')
                            )
                            ->searchable()
                            ->preload()
                            ->required(),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->columnSpanFull(),

                        TextInput::make('price')
                            ->label('Harga')
                            ->numeric()
                            ->prefix('Rp')
                            ->required()
                            ->minValue(0),

                        TextInput::make('stock')
                            ->label('Stok')
                            ->numeric()
                            ->integer()
                            ->minValue(0)
                            ->required(),

                        FileUpload::make('image')
                            ->label('Gambar Produk')
                            ->image()
                            ->directory('products')
                            ->disk('public')
                            ->imagePreviewHeight('200')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}