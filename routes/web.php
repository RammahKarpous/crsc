<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\FamilyGroupController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('pages.index');

// Family group
Route::get('/family-group', [FamilyGroupController::class, 'index'])->name('family-group.index');
Route::post('/family-group/store', [FamilyGroupController::class, 'store'])->name('family-group.store');
Route::get('/family-group/create', [FamilyGroupController::class, 'create'])->name('family-group.create');

Route::get('/family-group/{familyGroup:slug}', [FamilyGroupController::class, 'show'])->name('family-group.show');
Route::get('/family-group/{familyGroup:slug}/edit', [FamilyGroupController::class, 'edit'])->name('family-group.edit');
Route::put('/family-group/{familyGroup:slug}/update', [FamilyGroupController::class, 'update'])->name('family-group.update');

Route::get('/family-group/{familyGroup:slug}/create-member', [MemberController::class, 'create'])->name('family-group.create-member');

// Members
Route::post('/members/store', [MemberController::class, 'store'])->name('members.store');
Route::patch('/members/{member}/update', [MemberController::class, 'update'])->name('members.update');

// Meets
Route::get('/meets', [MeetController::class, 'index'])->name('meets.index');
Route::post('/meets/store', [MeetController::class, 'store'])->name('meets.store');

// Events
Route::post('/events/store', [EventsController::class, 'store'])->name('events.store');
Route::post('/events/{event}', [EventsController::class, 'addSwimmers'])->name('events.add-swimmers');
Route::patch('/events/{event}', [EventsController::class, 'update'])->name('events.update');

// Auth
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');