<?php

namespace App\Filament\Resources\TotalparticipantResource\Pages;

use App\Filament\Resources\TotalparticipantResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTotalparticipant extends ViewRecord
{
    protected static string $resource = TotalparticipantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
