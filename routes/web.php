<?php

use App\Http\Controllers\FamilyGroupController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\SwimmerController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Family group
Route::post('/family-group', [FamilyGroupController::class, 'store'])->name('family-group.store');

// Family members
Route::post('/parents', [ParentsController::class, 'store'])->name('parents.store');

// Swimmers
Route::post('/swimmers', [SwimmerController::class, 'store'])->name('swimmers.store');

// Meets
Route::post('/meets', [MeetController::class, 'store'])->name('meet.store');