<?php

namespace App\Filament\Resources\TotalparticipantResource\Pages;

use App\Filament\Resources\TotalparticipantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTotalparticipant extends EditRecord
{
    protected static string $resource = TotalparticipantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
