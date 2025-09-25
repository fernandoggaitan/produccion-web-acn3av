<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\CourseController;

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

//Cursos
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
