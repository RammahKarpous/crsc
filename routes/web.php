<?php

use App\Http\Controllers\FamilyGroupController;
use App\Http\Controllers\ParentsController;
use Illuminate\Support\Facades\Route;

Route::post('/members', [ParentsController::class, 'store'])->name('parents.add');
Route::post('/family-group', [FamilyGroupController::class, 'store'])->name('family-group.add');
