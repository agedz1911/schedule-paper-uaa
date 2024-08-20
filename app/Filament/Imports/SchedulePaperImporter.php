<?php

namespace App\Filament\Imports;

use App\Models\SchedulePaper;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class SchedulePaperImporter extends Importer
{
    protected static ?string $model = SchedulePaper::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('category')
                ->requiredMapping()
                ->relationship(resolveUsing: 'name')
                ->rules(['required']),
            ImportColumn::make('code_abstract')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('name_participant')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('title')
                ->requiredMapping()
                ->rules(['required', 'max:65535']),
            ImportColumn::make('date_presenter')
                ->requiredMapping()
                ->rules(['required', 'date']),
            ImportColumn::make('time_presenter')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('room')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('is_active')
                ->requiredMapping()
                ->boolean()
                ->rules(['required', 'boolean']),
        ];
    }

    public function resolveRecord(): ?SchedulePaper
    {
        // return SchedulePaper::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new SchedulePaper();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your schedule paper import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
