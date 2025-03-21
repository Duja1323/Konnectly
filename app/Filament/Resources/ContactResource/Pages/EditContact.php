<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditContact extends EditRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Supprimer')
                ->modalHeading('Supprimer le contact')
                ->modalDescription('Êtes-vous sûr de vouloir supprimer ce contact ? Cette action est irréversible.')
                ->modalSubmitActionLabel('Oui, supprimer')
                ->modalCancelActionLabel('Non, annuler'),
        ];
    }
}
