<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Initial admin user. Set SEED_ADMIN_* in .env; without a password a random one is generated.
        \App\Models\User::factory()->create([
            'name' => env('SEED_ADMIN_NAME', 'Admin'),
            'email' => env('SEED_ADMIN_EMAIL', 'admin@example.com'),
            'password' => bcrypt(env('SEED_ADMIN_PASSWORD') ?: Str::random(32)),
        ]);
    }
}
