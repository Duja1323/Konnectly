<x-filament-panels::page.simple>
    <div class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-100 via-purple-50 to-pink-100">
        <div class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]"></div>
        <div class="relative w-full max-w-2xl mx-auto p-4">
            <div class="mt-8 bg-white/80 backdrop-blur-xl shadow-2xl rounded-3xl p-8 space-y-8 border border-gray-100">
                <div class="text-center space-y-2">
                    <h1 class="text-4xl font-bold tracking-tight bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        {{ $this->getHeading() }}
                    </h1>
                    <p class="text-gray-600">
                        {{ $this->getSubheading() }}
                    </p>
                </div>

                <div class="space-y-4">
                    <x-filament-panels::form wire:submit="authenticate">
                        {{ $this->form }}

                        <div class="mt-6 space-y-4">
                            <x-filament::button
                                type="submit"
                                class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700"
                            >
                                {{ __('filament-panels::pages/auth/login.form.actions.authenticate.label') }}
                            </x-filament::button>

                            @foreach ($this->getFormActions() as $action)
                                @if ($action->getName() === 'google_login')
                                    {{ $action }}
                                @endif
                            @endforeach
                        </div>
                    </x-filament-panels::form>

                    <div class="text-center text-sm text-gray-600 mt-4">
                        <p>Pas encore de compte ? <a href="#" class="text-indigo-600 hover:text-indigo-500">Contactez-nous</a></p>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-4 left-0 right-0 text-center text-sm text-gray-600">
                <p>&copy; {{ date('Y') }} Konnectly. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</x-filament-panels::page.simple> 