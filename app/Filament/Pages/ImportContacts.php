<?php

namespace App\Filament\Pages;

use App\Imports\ContactsImport;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportContacts extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-tray';
    protected static ?string $navigationGroup = 'Contacts';
    protected static ?string $navigationLabel = 'Importer Contacts';
    protected static ?string $title = 'Importer des contacts';
    
    // Définir correctement le slug et l'ID pour les routes Filament
    protected static ?string $slug = 'import-contacts';
    protected static ?string $routePath = 'import-contacts';

    protected static string $view = 'filament.pages.import-contacts';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Importer des contacts')
                    ->description('Importez vos contacts à partir d\'un fichier CSV ou Excel')
                    ->schema([
                        FileUpload::make('file')
                            ->label('Fichier')
                            ->required()
                            ->acceptedFileTypes(['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv'])
                            ->helperText('Formats acceptés : CSV, XLS, XLSX')
                            ->maxSize(5120) // 5MB
                    ])
            ])
            ->statePath('data');
    }

    public function import()
    {
        $data = $this->form->getState();

        $path = Storage::disk('public')->path($data['file']);

        try {
            $import = new ContactsImport();
            Excel::import($import, $path);

            Notification::make()
                ->title('Contacts importés avec succès')
                ->success()
                ->send();

            // Supprimer le fichier après importation
            Storage::disk('public')->delete($data['file']);

            // Réinitialiser le formulaire
            $this->form->fill();
        } catch (\Exception $e) {
            Notification::make()
                ->title('Erreur lors de l\'importation')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }
}
