<?php

use App\Http\Controllers\ParentsController;
use Illuminate\Support\Facades\Route;

Route::post('/members', [ParentsController::class, 'store'])->name('parents.add');
