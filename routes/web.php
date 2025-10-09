<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


//php artisan make:model Course -mcr

Route::get('test', function () {
    
    return 'Test';

});

Route::get('saludo/{nombre}', function($nombre){
    return "Hola, {$nombre}";
});

//Cursos.
Route::resource('courses', CourseController::class);
/*
Route::get('courses', [
    CourseController::class,
    'index'
])->name('courses.index');

Route::get('courses/create', [
    CourseController::class,
    'create'
])->name('courses.create');

Route::post('courses', [
    CourseController::class,
    'store'
])->name('courses.store');

Route::get('courses/{course}', [
    CourseController::class,
    'show'
])->name('courses.show');

Route::get('courses/{course}/edit', [
    CourseController::class,
    'edit'
])->name('courses.edit');

Route::put('courses/{course}', [
    CourseController::class,
    'update'
])->name('courses.update');

Route::delete('courses/{course}', [
    CourseController::class,
    'destroy'
])->name('courses.destroy');
*/
//Fin del controlador de recursos.

//Comentarios
Route::get('comments', [
    CommentController::class,
    'index'
])->name('comments.index');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
