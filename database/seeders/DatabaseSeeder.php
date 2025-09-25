<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
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
        // User::factory(10)->create();

        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

        User::factory()->create([
            'name' => 'Fernando',
            'email' => 'fernando.gaitan@davinci.edu.ar',
            'password' => Hash::make('1234')
        ]);

        Course::factory(1000)->create();

    }
}
