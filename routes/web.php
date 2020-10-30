<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\FamilyGroupController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\SwimmerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('pages.index');

// Family group
Route::get('/family-group', [FamilyGroupController::class, 'index'])->name('family-group.index');
Route::get('/family-group/create', [FamilyGroupController::class, 'create'])->name('family-group.create');
Route::post('/family/store', [FamilyGroupController::class, 'store'])->name('family-group.store');

// Family members
Route::post('/parents', [ParentsController::class, 'store'])->name('parents.store');
Route::patch('/parent/{parent}', [ParentsController::class, 'update'])->name('parents.update');

// Swimmers
Route::post('/swimmers', [SwimmerController::class, 'store'])->name('swimmers.store');
Route::patch('/swimmers/{swimmer}', [SwimmerController::class, 'update'])->name('swimmers.update');

// Meets
Route::post('/meets/store', [MeetController::class, 'store'])->name('meet.store');

// Events
Route::post('/events/store', [EventsController::class, 'store'])->name('events.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');