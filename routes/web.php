<?php

use App\Http\Controllers\FamilyGroupController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\ParentsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Family group
Route::post('/family-group', [FamilyGroupController::class, 'store'])->name('family-group.store');

// Family members
Route::post('/members', [ParentsController::class, 'store'])->name('parents.store');

// Meets
Route::post('/meets', [MeetController::class, 'store'])->name('meet.store');