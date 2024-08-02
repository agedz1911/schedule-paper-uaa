<?php

namespace App\Filament\Imports;

use App\Models\TotalParticipant;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class TotalParticipantImporter extends Importer
{
    protected static ?string $model = TotalParticipant::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('country')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('total')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('grand_total')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('is_active')
                ->requiredMapping()
                ->boolean()
                ->rules(['required', 'boolean']),
        ];
    }

    public function resolveRecord(): ?TotalParticipant
    {
        // return TotalParticipant::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new TotalParticipant();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your total participant import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
