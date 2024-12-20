<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Doctrine\DBAL\Schema\Column;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255)
                    ->default(null)
                    ->unique()
                    ->columnSpan(3),
                Forms\Components\TextInput::make('inter_row_padding')
                    ->numeric()
                    ->default(null)
                    ->columnSpan(1),
                Forms\Components\TextInput::make('top_frame_padding')
                    ->numeric()
                    ->default(null)
                    ->columnSpan(1),
                Forms\Components\Toggle::make('is_column_mirrored')
                    ->required()
                    ->columnSpan(1),
                Forms\Components\TextInput::make('inter_col_padding')
                    ->numeric()
                    ->default(null)
                    ->columnSpan(1),
                Forms\Components\TextInput::make('custom_padding')
                    ->numeric()
                    ->default(null)
                    ->columnSpan(1),
                Forms\Components\Toggle::make('is_no_cut')
                    ->required()
                    ->columnSpan(1),
                Forms\Components\TextInput::make('image_id')
                    ->numeric()
                    ->default(null)
                    ->columnSpan(1),
                Forms\Components\TextInput::make('width')
                    ->numeric()
                    ->default(null)
                    ->columnSpan(1),
                Forms\Components\Toggle::make('is_seasonal')
                    ->required()
                    ->columnSpan(1),
                Forms\Components\TextInput::make('height')
                    ->numeric()
                    ->default(null)
                    ->columnSpan(1),



            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('inter_row_padding')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('top_frame_padding')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('inter_col_padding')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('custom_padding')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('image_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('width')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('height')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_column_mirrored')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_no_cut')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_seasonal')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function afterCreate(Form $form, $record)
    {
        // You can show a custom message here after the record is created.
        // For example, display a success message and redirect back to the table.

        return redirect()->route('filament.resources.category.index')
            ->with('success', 'Product created successfully.');
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
