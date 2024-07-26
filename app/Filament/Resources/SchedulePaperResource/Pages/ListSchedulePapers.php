<?php

namespace App\Filament\Resources\SchedulePaperResource\Pages;

use App\Filament\Imports\SchedulePaperImporter;
use App\Filament\Resources\SchedulePaperResource;
use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListSchedulePapers extends ListRecords
{
    protected static string $resource = SchedulePaperResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->importer(SchedulePaperImporter::class),
            Actions\CreateAction::make(),

        ];
    }
}
