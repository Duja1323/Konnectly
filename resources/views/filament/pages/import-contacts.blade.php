<x-filament::page>
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Importer des contacts</h2>
        <p class="text-gray-600 mb-6">Importez facilement vos contacts à partir d'un fichier CSV ou Excel.</p>
        
        <form wire:submit="import" class="space-y-4">
            {{ $this->form }}

            <div class="mt-6">
                <x-filament::button type="submit" size="lg" class="w-full md:w-auto">
                    <span class="flex items-center gap-1">
                        <x-heroicon-o-arrow-up-tray class="w-5 h-5" />
                        <span>Importer les contacts</span>
                    </span>
                </x-filament::button>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Instructions pour l'importation</h3>
        
        <div class="mb-6">
            <h4 class="font-medium text-gray-900 mb-2">Format requis</h4>
            <p class="text-gray-600 mb-2">Votre fichier CSV ou Excel doit contenir les colonnes suivantes :</p>
            <ul class="list-disc list-inside space-y-1 ml-4 text-gray-600">
                <li><strong class="text-primary-600">name</strong> (obligatoire) - Le nom du contact</li>
                <li><strong class="text-primary-600">email</strong> (obligatoire) - L'adresse email du contact</li>
                <li><strong class="text-primary-600">phone</strong> (optionnel) - Le numéro de téléphone du contact</li>
                <li><strong class="text-primary-600">group</strong> (optionnel) - Le groupe du contact (par défaut: "amis")</li>
                <li><strong class="text-primary-600">notes</strong> (optionnel) - Des notes sur le contact</li>
            </ul>
        </div>
        
        <div class="mb-6">
            <h4 class="font-medium text-gray-900 mb-2">Exemple de format</h4>
            <div class="bg-gray-100 p-3 rounded-lg overflow-x-auto font-mono text-sm">
                <pre>name,email,phone,group,notes
John Doe,john@example.com,+33612345678,amis,Note sur John
Jane Smith,jane@example.com,+33687654321,famille,Note sur Jane</pre>
            </div>
        </div>
        
        <div class="mb-6">
            <h4 class="font-medium text-gray-900 mb-2">Télécharger des exemples</h4>
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ asset('examples/contacts_example.csv') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Exemple CSV
                </a>
                
                <a href="{{ asset('examples/contacts_example.xlsx') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-primary-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Exemple Excel
                </a>
            </div>
        </div>
        
        <div class="border-t border-gray-200 pt-4">
            <a href="{{ asset('examples/README.md') }}" target="_blank" class="inline-flex items-center text-primary-600 hover:text-primary-500 font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Consulter le guide complet d'importation et d'exportation
            </a>
        </div>
    </div>
</x-filament::page>
