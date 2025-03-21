<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ContactsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;

    protected $group = null;

    public function __construct($group = null)
    {
        $this->group = $group;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if ($this->group) {
            return Contact::where('group', $this->group)->get();
        }
        
        return Contact::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nom',
            'Email',
            'Groupe',
            'Téléphone',
            'Notes',
            'Date de création',
            'Dernière mise à jour'
        ];
    }

    /**
     * @param Contact $contact
     * @return array
     */
    public function map($contact): array
    {
        return [
            $contact->id,
            $contact->name,
            $contact->email,
            $contact->group,
            $contact->phone,
            $contact->notes,
            $contact->created_at->format('d/m/Y H:i'),
            $contact->updated_at->format('d/m/Y H:i'),
        ];
    }
}
