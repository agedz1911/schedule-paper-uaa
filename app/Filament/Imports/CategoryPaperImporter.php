<?php

namespace App\Filament\Imports;

use App\Models\CategoryPaper;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class CategoryPaperImporter extends Importer
{
    protected static ?string $model = CategoryPaper::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->label('name')
                ->example('Free Paper')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('is_active')
                ->label('is_active')
                ->example(1)
                ->requiredMapping()
                ->boolean()
                ->rules(['required', 'boolean']),
        ];
    }

    public function resolveRecord(): ?CategoryPaper
    {
        // return CategoryPaper::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new CategoryPaper();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your category paper import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
