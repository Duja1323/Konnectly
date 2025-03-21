<?php

namespace App\Filament\Pages;

use App\Exports\ContactsExport;
use App\Models\Contact;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Collection;

class ExportContacts extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-tray';
    protected static ?string $navigationGroup = 'Contacts';
    protected static ?string $navigationLabel = 'Exporter Contacts';
    protected static ?string $title = 'Exporter des contacts';
    
    // Définir correctement le slug et l'ID pour les routes Filament
    protected static ?string $slug = 'export-contacts';
    protected static ?string $routePath = 'export-contacts';

    protected static string $view = 'filament.pages.export-contacts';

    public ?array $data = [];
    public Collection $groups;

    public function mount(): void
    {
        $this->groups = Contact::select('group')->distinct()->pluck('group');
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Exporter des contacts')
                    ->description('Exportez vos contacts au format CSV ou Excel')
                    ->schema([
                        Radio::make('format')
                            ->label('Format d\'exportation')
                            ->options([
                                'csv' => 'CSV',
                                'xlsx' => 'Excel (XLSX)',
                            ])
                            ->default('xlsx')
                            ->required(),
                        
                        Select::make('group')
                            ->label('Groupe (optionnel)')
                            ->options(function () {
                                return $this->groups->mapWithKeys(function ($group) {
                                    return [$group => ucfirst($group)];
                                });
                            })
                            ->placeholder('Tous les contacts')
                            ->searchable(),
                    ])
            ])
            ->statePath('data');
    }

    public function export()
    {
        $data = $this->form->getState();
        $format = $data['format'] ?? 'xlsx';
        $group = $data['group'] ?? null;

        $export = new ContactsExport($group);

        $filename = 'contacts_' . now()->format('Y-m-d_His');

        try {
            if ($format === 'csv') {
                return $export->download($filename . '.csv', \Maatwebsite\Excel\Excel::CSV);
            } else {
                return $export->download($filename . '.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            }
        } catch (\Exception $e) {
            Notification::make()
                ->title('Erreur lors de l\'exportation')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }
}
