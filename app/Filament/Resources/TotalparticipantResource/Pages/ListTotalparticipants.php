<?php

namespace App\Filament\Resources\TotalparticipantResource\Pages;

use App\Filament\Imports\TotalParticipantImporter;
use App\Filament\Resources\TotalparticipantResource;
use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListTotalparticipants extends ListRecords
{
    protected static string $resource = TotalparticipantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->importer(TotalParticipantImporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
