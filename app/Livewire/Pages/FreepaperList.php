<?php

namespace App\Livewire\Pages;

use App\Models\SchedulePaper;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Presentation Schedule')]
class FreepaperList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;


    public function table(Table $table): Table
    {
        return $table
            ->query(SchedulePaper::query())
            ->columns([
                TextColumn::make('code_abstract')
                    ->label('Code')
                    ->sortable(),
                TextColumn::make('name_participant')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('title')
                    ->limit('50')
                    ->tooltip(fn (Model $record): string => "By {$record->title}"),
                TextColumn::make('category.name')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Podium Presentation' => 'success',
                        'Podium Video Presentation' => 'warning',
                        'Podium Poster Presentation' => 'info',
                    })
                    ->sortable()
                    ->searchable(),
                TextColumn::make('date_presenter')
                    ->label('Date')
                    ->sortable()
                    ->date('l, j F Y'),
                TextColumn::make('time_presenter')->label('Time')
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.pages.freepaper-list');
    }
}
