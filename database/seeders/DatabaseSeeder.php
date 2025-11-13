<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Role;
use App\Models\Status;
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
    
        //Creamos varios usuarios.
        $admin = User::factory()->create([
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

        //Creamos los roles.
        $roles = ['Administrador', 'Profesor', 'Alumno'];

        foreach($roles as $r){
            Role::create([
                'name' => $r
            ]);
        }

        //Agregamos roles.
        $admin->roles()->sync( [1, 2] );

        //Lo hizo deepseek.
        $users->each(function ($user) {
            $roles = rand(0, 100) < 30 ? [2, 3] : [rand(2, 3)];
            $user->roles()->sync($roles);
        });

        //Creamos los estados.
        $estados = ['Pendiente', 'En proceso', 'Finalizada'];

        foreach($estados as $e){
            Status::create([
                'name' => $e
            ]);
        }

    }
}
