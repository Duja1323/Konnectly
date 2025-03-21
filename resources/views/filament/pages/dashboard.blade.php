<x-filament-panels::page>
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Bienvenue sur votre tableau de bord</h2>
        <p class="text-gray-600 dark:text-gray-400">Gérez efficacement vos contacts et suivez vos activités</p>
    </div>
    
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
        <!-- Statistiques -->
        <div class="rounded-lg bg-white p-4 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
            <div class="flex items-center gap-x-3">
                <div class="flex-1 text-center">
                    <h3 class="text-sm font-medium text-gray-900 dark:text-white font-sans">Contacts totaux</h3>
                    <p class="mt-1 text-2xl font-semibold tracking-tight text-primary-600 font-sans">{{ \App\Models\Contact::count() }}</p>
                </div>
                <div class="rounded-lg bg-gray-100/80 p-2 dark:bg-gray-800">
                    <x-heroicon-o-users class="h-5 w-5 text-gray-600 dark:text-gray-400" />
                </div>
            </div>
        </div>

        <!-- Messages non lus -->
        <div class="rounded-lg bg-white p-4 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
            <div class="flex items-center gap-x-3">
                <div class="flex-1 text-center">
                    <h3 class="text-sm font-medium text-gray-900 dark:text-white font-sans">Messages non lus</h3>
                    <p class="mt-1 text-2xl font-semibold tracking-tight text-primary-600 font-sans">5</p>
                </div>
                <div class="rounded-lg bg-gray-100/80 p-2 dark:bg-gray-800">
                    <x-heroicon-o-envelope class="h-5 w-5 text-gray-600 dark:text-gray-400" />
                </div>
            </div>
        </div>

        <!-- Événements à venir -->
        <div class="rounded-lg bg-white p-4 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
            <div class="flex items-center gap-x-3">
                <div class="flex-1 text-center">
                    <h3 class="text-sm font-medium text-gray-900 dark:text-white font-sans">Événements à venir</h3>
                    <p class="mt-1 text-2xl font-semibold tracking-tight text-primary-600 font-sans">3</p>
                </div>
                <div class="rounded-lg bg-gray-100/80 p-2 dark:bg-gray-800">
                    <x-heroicon-o-calendar class="h-5 w-5 text-gray-600 dark:text-gray-400" />
                </div>
            </div>
        </div>

        <!-- Notifications -->
        <div class="rounded-lg bg-white p-4 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
            <div class="flex items-center gap-x-3">
                <div class="flex-1 text-center">
                    <h3 class="text-sm font-medium text-gray-900 dark:text-white font-sans">Notifications</h3>
                    <p class="mt-1 text-2xl font-semibold tracking-tight text-primary-600 font-sans">3</p>
                </div>
                <div class="rounded-lg bg-gray-100/80 p-2 dark:bg-gray-800">
                    <x-heroicon-o-bell class="h-5 w-5 text-gray-600 dark:text-gray-400" />
                </div>
            </div>
        </div>
    </div>

    <!-- Activité récente -->
    <div class="mt-8">
        <div class="rounded-lg bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 transition-all duration-300 hover:shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-x-3">
                    <x-heroicon-o-clock class="w-6 h-6 text-primary-500" />
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Activité récente</h3>
                </div>
                <span class="px-3 py-1 text-sm font-medium text-primary-600 bg-primary-50 rounded-full dark:bg-primary-900/10">7 derniers jours</span>
            </div>

            <div class="mt-6 flow-root">
                <ul role="list" class="-mb-8 space-y-6">
                    <li class="transform transition-all duration-300 hover:scale-[1.01]">
                        <div class="relative pb-8">
                            <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gradient-to-b from-primary-500 to-transparent dark:from-primary-400" aria-hidden="true"></span>
                            <div class="relative flex items-center space-x-4">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-primary-500 to-primary-600 shadow-md">
                                    <x-heroicon-o-user-plus class="h-5 w-5 text-white" />
                                </div>
                                <div class="flex min-w-0 flex-1 justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            Nouveau contact ajouté : 
                                            <span class="font-semibold text-gray-900 dark:text-white hover:text-primary-600 transition-colors duration-200">Jean Dupont</span>
                                        </p>
                                    </div>
                                    <div class="ml-4">
                                        <time class="whitespace-nowrap text-sm text-gray-500 bg-gray-50 px-2 py-1 rounded-full dark:bg-gray-800">Il y a 3 heures</time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="transform transition-all duration-300 hover:scale-[1.01]">
                        <div class="relative pb-8">
                            <span class="absolute left-4 top-4 -ml-px h-full w-0.5 bg-gradient-to-b from-secondary-500 to-transparent dark:from-secondary-400" aria-hidden="true"></span>
                            <div class="relative flex items-center space-x-4">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-secondary-500 to-secondary-600 shadow-md">
                                    <x-heroicon-o-envelope class="h-5 w-5 text-white" />
                                </div>
                                <div class="flex min-w-0 flex-1 justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            Email envoyé à 
                                            <span class="font-semibold text-gray-900 dark:text-white hover:text-secondary-600 transition-colors duration-200">Marie Martin</span>
                                        </p>
                                    </div>
                                    <div class="ml-4">
                                        <time class="whitespace-nowrap text-sm text-gray-500 bg-gray-50 px-2 py-1 rounded-full dark:bg-gray-800">Il y a 5 heures</time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="transform transition-all duration-300 hover:scale-[1.01]">
                        <div class="relative">
                            <div class="relative flex items-center space-x-4">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-green-500 to-green-600 shadow-md">
                                    <x-heroicon-o-calendar class="h-5 w-5 text-white" />
                                </div>
                                <div class="flex min-w-0 flex-1 justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            Événement planifié : 
                                            <span class="font-semibold text-gray-900 dark:text-white hover:text-green-600 transition-colors duration-200">Réunion d'équipe</span>
                                        </p>
                                    </div>
                                    <div class="ml-4">
                                        <time class="whitespace-nowrap text-sm text-gray-500 bg-gray-50 px-2 py-1 rounded-full dark:bg-gray-800">Il y a 1 jour</time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-filament-panels::page> 