<?php

namespace App\Providers\Filament;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\NavigationGroup;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Pages\Auth\Login;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->colors([
                'primary' => [
                    500 => '#6366f1',
                    600 => '#4f46e5',
                    700 => '#4338ca',
                ],
                'secondary' => [
                    500 => '#a855f7',
                    600 => '#9333ea',
                    700 => '#7e22ce',
                ],
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                \App\Filament\Pages\Dashboard::class,
                \App\Filament\Pages\ImportContacts::class,
                \App\Filament\Pages\ExportContacts::class,
            ])
            ->navigationGroups([
                'Navigation',
                'Contacts',
                'Communication',
                'Paramètres',
            ])
            ->navigationItems([
                NavigationItem::make('Tableau de bord')
                    ->icon('heroicon-o-home')
                    ->url(fn (): string => '/admin/dashboard')
                    ->group('Navigation')
                    ->sort(1),
                NavigationItem::make('Calendrier')
                    ->icon('heroicon-o-calendar')
                    ->url(fn (): string => '/admin/calendar')
                    ->group('Navigation')
                    ->sort(2),
                NavigationItem::make('Notifications')
                    ->icon('heroicon-o-bell')
                    ->url(fn (): string => '/admin/notifications')
                    ->group('Communication')
                    ->badge(fn () => '3', color: 'warning')
                    ->sort(1),
                NavigationItem::make('Messagerie')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->url(fn (): string => '/admin/chat')
                    ->group('Communication')
                    ->sort(2),
                NavigationItem::make('Emails')
                    ->icon('heroicon-o-envelope')
                    ->url(fn (): string => '/admin/emails')
                    ->group('Communication')
                    ->sort(3),
                NavigationItem::make('Importer Contacts')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->url(fn (): string => '/admin/import-contacts')
                    ->group('Contacts')
                    ->sort(2),
                NavigationItem::make('Exporter Contacts')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn (): string => '/admin/export-contacts')
                    ->group('Contacts')
                    ->sort(3),
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->brandName('Konnectly')
            ->sidebarCollapsibleOnDesktop()
            ->maxContentWidth('full');
    }
} 