<?php

use App\Http\Controllers\EleveController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationEleveController;
use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {


    ///*
    Route::get("/eleves", [EleveController::class, 'index'])->name('eleves.index');
    Route::get('/eleves/create', [EleveController::class, 'create'])->name('eleves.create');
    Route::post('/eleves', [EleveController::class, 'store'])->name('eleves.store');
    Route::get('/eleves/{eleve}', [EleveController::class, 'show'])->name('eleves.show');
    Route::get('/eleves/{eleve}/edit', [EleveController::class, 'edit'])->name('eleves.edit');
    Route::put('/eleves/{eleve}', [EleveController::class, 'update'])->name('eleves.update');
    Route::delete('/eleves/{eleve}', [EleveController::class, 'destroy'])->name('eleves.destroy');
    Route::get('/eleves/{eleve}/grades', [EleveController::class, 'showGrades'])->name('eleves.grades');
    //*
    //Route::resource('eleves', EleveController::class);
    Route::resource('modules', ModuleController::class);

    Route::get('/evaluations/{evaluation}/showUnderAverage', [EvaluationController::class, 'showUnderAverage'])
         ->name('evaluations.showUnderAverage');
    Route::resource('evaluations', EvaluationController::class);
    Route::resource('evaluation_eleves', EvaluationEleveController::class);
});

require_once __DIR__ . '/auth.php';
