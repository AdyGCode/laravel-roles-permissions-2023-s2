<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            ProductSeeder::class,
            OrderSeeder::class,
            OrderProductSeeder::class,

            // Make sure you seed Permissions first
            PermissionTableSeeder::class,
            // If the application had known roles, these could be seeded next
            // Now you are able to create an Administrator/Superuser account
            CreateAdminUserSeeder::class,
        ]);
    }
}
