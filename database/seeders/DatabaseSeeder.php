<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
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

        //Creamos varios usuarios.
        User::factory()->create([
            'name' => 'Fernando',
            'email' => 'fernando.gaitan@davinci.edu.ar',
            'password' => Hash::make('1234')
        ]);
        //Creamos varios usuarios aleatorios.
        $users = User::factory(49)->create();

        //Crear comentarios de forma aleatoria.
        Comment::factory(500)->create();

        //Creación de cursos.
        Course::factory(1000)->create();

    }
}
