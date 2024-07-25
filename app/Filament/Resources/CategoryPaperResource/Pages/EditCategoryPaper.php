<?php

namespace App\Filament\Resources\CategoryPaperResource\Pages;

use App\Filament\Resources\CategoryPaperResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryPaper extends EditRecord
{
    protected static string $resource = CategoryPaperResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
