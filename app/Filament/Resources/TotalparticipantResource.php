<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TotalparticipantResource\Pages;
use App\Filament\Resources\TotalparticipantResource\RelationManagers;
use App\Models\Totalparticipant;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TotalparticipantResource extends Resource
{
    protected static ?string $model = Totalparticipant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('country'),
                TextInput::make('total')->numeric(),
                Toggle::make('is_active')->default(true)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('country'),
                TextColumn::make('total'),
                IconColumn::make('is_active')->boolean()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListTotalparticipants::route('/'),
            'create' => Pages\CreateTotalparticipant::route('/create'),
            'view' => Pages\ViewTotalparticipant::route('/{record}'),
            'edit' => Pages\EditTotalparticipant::route('/{record}/edit'),
        ];
    }
}
