<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin1323@konnectly.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        // Create additional users
        User::factory(10)->create();

        // Create Contacts
        Contact::factory(20)->create();
    }
}
