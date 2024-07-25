<?php

namespace App\Filament\Resources\SchedulePaperResource\Pages;

use App\Filament\Resources\SchedulePaperResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSchedulePaper extends EditRecord
{
    protected static string $resource = SchedulePaperResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
