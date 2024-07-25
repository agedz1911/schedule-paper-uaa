<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchedulePaperResource\Pages;
use App\Filament\Resources\SchedulePaperResource\RelationManagers;
use App\Models\SchedulePaper;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SchedulePaperResource extends Resource
{
    protected static ?string $model = SchedulePaper::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->preload()
                    ->searchable(),
                TextInput::make('code_abstract'),
                TextInput::make('name_participant'),
                Textarea::make('title'),
                DatePicker::make('date_presenter')
                    ->native(false),
                TextInput::make('time_presenter'),
                Toggle::make('is_active')->default(true)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')->searchable()->sortable(),
                TextColumn::make('code_abstract')->sortable(),
                TextColumn::make('name_participant')->searchable(),
                TextColumn::make('title')->limit('100'),
                TextColumn::make('date_presenter')->date('l, j F Y'),
                TextColumn::make('time_presenter')
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListSchedulePapers::route('/'),
            'create' => Pages\CreateSchedulePaper::route('/create'),
            'edit' => Pages\EditSchedulePaper::route('/{record}/edit'),
        ];
    }
}
