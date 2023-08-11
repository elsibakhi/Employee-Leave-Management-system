<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Baraa',
            'email' => 'baraa@example.com',
            'email_verified_at' => '10-10-2022 10:00:00',
            'password' => Hash::make("12345678"),
            'role' => "administrator",
        ]);
    }
}
