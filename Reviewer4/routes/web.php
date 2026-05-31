<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\OrderController3;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::resource('books', BookController::class);