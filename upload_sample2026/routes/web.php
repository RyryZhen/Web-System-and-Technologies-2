<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

// The views
Route::get('/upload', [PhotoController::class, 'create'])->name('photos.index');

// The actions
Route::post('/upload-single', [PhotoController::class, 'storeSingle'])->name('photos.store.single');
Route::post('/upload-multiple', [PhotoController::class, 'storeMultiple'])->name('photos.store.multiple');
Route::delete('/photo/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
Route::delete('/photos-clear-all', [PhotoController::class, 'destroyAll'])->name('photos.destroyAll');