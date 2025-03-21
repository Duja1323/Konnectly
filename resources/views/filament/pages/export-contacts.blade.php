<x-filament::page>
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Exporter des contacts</h2>
        <p class="text-gray-600 mb-6">Exportez vos contacts dans le format de votre choix pour les utiliser dans d'autres applications.</p>
        
        <form wire:submit="export" class="space-y-4">
            {{ $this->form }}

            <div class="mt-6">
                <x-filament::button type="submit" size="lg" class="w-full md:w-auto">
                    <span class="flex items-center gap-1">
                        <x-heroicon-o-arrow-down-tray class="w-5 h-5" />
                        <span>Exporter les contacts</span>
                    </span>
                </x-filament::button>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Informations sur l'exportation</h3>
        
        <div class="mb-6">
            <h4 class="font-medium text-gray-900 mb-2">Formats disponibles</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h5 class="font-medium text-gray-900">CSV</h5>
                    </div>
                    <p class="text-gray-600 text-sm">Format texte simple, compatible avec la plupart des applications de tableur et de gestion de contacts.</p>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h5 class="font-medium text-gray-900">Excel</h5>
                    </div>
                    <p class="text-gray-600 text-sm">Format Microsoft Excel, idéal pour l'analyse et la manipulation avancée des données.</p>
                </div>
            </div>
        </div>
        
        <div class="mb-6">
            <h4 class="font-medium text-gray-900 mb-2">Colonnes exportées</h4>
            <ul class="list-disc list-inside space-y-1 ml-4 text-gray-600">
                <li><strong class="text-primary-600">ID</strong> - L'identifiant du contact</li>
                <li><strong class="text-primary-600">name</strong> - Le nom du contact</li>
                <li><strong class="text-primary-600">email</strong> - L'adresse email du contact</li>
                <li><strong class="text-primary-600">phone</strong> - Le numéro de téléphone du contact</li>
                <li><strong class="text-primary-600">group</strong> - Le groupe du contact</li>
                <li><strong class="text-primary-600">notes</strong> - Les notes associées au contact</li>
                <li><strong class="text-primary-600">created_at</strong> - Date de création du contact</li>
                <li><strong class="text-primary-600">updated_at</strong> - Date de dernière mise à jour du contact</li>
            </ul>
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
