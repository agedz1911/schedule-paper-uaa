<?php

namespace App\Filament\Resources\CategoryPaperResource\Pages;

use App\Filament\Imports\CategoryPaperImporter;
use App\Filament\Resources\CategoryPaperResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListCategoryPapers extends ListRecords
{
    protected static string $resource = CategoryPaperResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->importer(CategoryPaperImporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
