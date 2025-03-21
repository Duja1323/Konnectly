<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\Checkbox;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class Login extends BaseLogin
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Email')
            ->email()
            ->required()
            ->autocomplete()
            ->extraAttributes([
                'class' => 'rounded-xl border-indigo-300 focus:border-indigo-500 focus:ring-indigo-500',
                'placeholder' => 'votre@email.com'
            ])
            ->columnSpanFull();
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label('Mot de passe')
            ->password()
            ->required()
            ->extraAttributes([
                'class' => 'rounded-xl border-indigo-300 focus:border-indigo-500 focus:ring-indigo-500',
                'placeholder' => '••••••••'
            ])
            ->columnSpanFull();
    }

    protected function getRememberFormComponent(): Component
    {
        return Checkbox::make('remember')
            ->label('Se souvenir de moi')
            ->extraAttributes(['class' => 'text-indigo-500 focus:ring-indigo-500 rounded-lg']);
    }

    public function getTitle(): string
    {
        return 'Connexion';
    }

    public function getHeading(): string
    {
        return 'Bienvenue sur Konnectly';
    }

    public function getSubheading(): string
    {
        return 'Connectez-vous et transformez vos relations clients en succès';
    }

    protected function getFormActions(): array
    {
        return [
            $this->getAuthenticateFormAction()
                ->extraAttributes(['class' => 'bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700']),
            Action::make('google_login')
                ->label('Se connecter avec Google')
                ->url(route('filament.auth.google'))
                ->color('secondary')
                ->icon('heroicon-o-academic-cap')
                ->extraAttributes(['class' => 'w-full justify-center hover:bg-gray-100 transition duration-200']),
        ];
    }

    protected function getForgotPasswordUrl(): ?string
    {
        return route('filament.admin.password.request');
    }

    protected function hasFullWidthFormActions(): bool
    {
        return true;
    }

    protected function hasIllustration(): bool
    {
        return true;
    }
}