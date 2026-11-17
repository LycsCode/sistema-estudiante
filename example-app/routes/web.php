
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

Route::get('/', [EstudianteController::class, 'index'])
    ->name('estudiantes.index');

Route::get('/estudiantes/crear', function () {
    return view('estudiantes.crear');
})->name('estudiantes.create');

Route::post('/estudiantes', [EstudianteController::class, 'store'])
    ->name('estudiantes.store');

Route::get('/estudiantes/{id}/editar', [EstudianteController::class, 'edit'])
    ->name('estudiantes.edit');

Route::put('/estudiantes/{id}', [EstudianteController::class, 'update'])
    ->name('estudiantes.update');

Route::delete('/estudiantes/{id}', [EstudianteController::class, 'destroy'])
    ->name('estudiantes.destroy');
