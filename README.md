# Konnectly - Contact Management App


**Konnectly** est une application moderne et open-source de gestion de contacts, développée avec [Laravel](https://laravel.com/) et [Filament PHP](https://filamentphp.com/).  
Conçue pour être simple, rapide et intuitive, elle vous permet de centraliser et organiser tous vos contacts en un seul endroit. 🚀  

---

## 🛠️ Tech Stack

- **Laravel** - Framework backend robuste  
- **Filament PHP** - Puissant panel d'administration  
- **Livewire & Alpine.js** - Interactivité fluide  
- **Tailwind CSS** - Design épuré et moderne  

---


## 🚀 Installation Locale

1. **Cloner le dépôt**  
   ```bash
   git clone https://github.com/ton-projet/konnectly.git
   cd konnectly

## ⚙️ Installer les dépendances

   ```bash

composer install   # Installation des dépendances PHP
npm install        # Installation des dépendances JS
npm run build      # Compilation des assets front-end
   ```

## 🛠️ Configurer la base de données
Remplace les informations dans le fichier .env :
 ```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=konnectly
DB_USERNAME=root
DB_PASSWORD=

 ```
## 🔄 Exécuter les migrations
 ```bash
php artisan migrate
 ```
## 🏗️ Générer des données de test(Optionnel)

 ```bash
php artisan db:seed
 ```
## 🎯 Fonctionnalités Clés
✅ Gestion complète des contacts (ajout, modification, suppression)

✅ Import/export des contacts (CSV, Excel, vCard)

✅ Authentification sécurisée avec Google OAuth

✅ Tableau de bord interactif avec statistiques

✅ Partage de contacts et gestion des permissions

✅ Synchronisation avec Google Contacts

💡Konnectly est conçu pour vous aider à gérer vos contacts de manière fluide et efficace. Essayez-le dès maintenant ! 💙
