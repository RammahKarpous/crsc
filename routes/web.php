<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\FamilyGroupController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('pages.index');

// Family group
Route::get('/family-group', [FamilyGroupController::class, 'index'])->name('family-group.index')->middleware('auth');
Route::post('/family-group/store', [FamilyGroupController::class, 'store'])->name('family-group.store')->middleware('auth');
Route::get('/family-group/create', [FamilyGroupController::class, 'create'])->name('family-group.create')->middleware('auth');

Route::get('/family-group/{familyGroup:slug}', [FamilyGroupController::class, 'show'])->name('family-group.show')->middleware('auth');
Route::get('/family-group/{familyGroup:slug}/edit', [FamilyGroupController::class, 'edit'])->name('family-group.edit')->middleware('auth');
Route::put('/family-group/{familyGroup:slug}/update', [FamilyGroupController::class, 'update'])->name('family-group.update')->middleware('auth');

// Create member through family group
Route::get('/family-group/{familyGroup:slug}/create-member', [UserController::class, 'create'])->name('members.create')->middleware('auth');

// Members
Route::post('/users/store', [UserController::class, 'store'])->name('members.store')->middleware('auth');
Route::get('/users/{user:slug}/edit', [UserController::class, 'edit'])->name('members.edit')->middleware('auth');
Route::patch('/users/{user}/update', [UserController::class, 'update'])->name('members.update')->middleware('auth');

// Meets
Route::get('/meets', [MeetController::class, 'index'])->name('meets.index');
Route::post('/meets', [MeetController::class, 'filterMeet'])->name('meets.filter');
Route::get('/meets/create', [MeetController::class, 'create'])->name('meets.create')->middleware('auth');
Route::post('/meets/store', [MeetController::class, 'store'])->name('meets.store')->middleware('auth');
Route::get('/meets/{meet:slug}/edit', [MeetController::class, 'edit'])->name('meets.edit')->middleware('auth');
Route::patch('/meets/{meet:slug}/update', [MeetController::class, 'update'])->name('meets.update')->middleware('auth');
Route::get('/meets/{meet:slug}', [MeetController::class, 'show'])->name('meets.show');

// Create event through meet
Route::get('/meets/{meet:slug}/create-event', [EventsController::class, 'create'])->name('events.create')->middleware('auth');

// Events
Route::post('/events/store', [EventsController::class, 'store'])->name('events.store')->middleware('auth');
Route::post('/events/{event}', [EventsController::class, 'storeSwimmers'])->name('events.store-swimmers')->middleware('auth');
Route::patch('/events/{event}', [EventsController::class, 'update'])->name('events.update')->middleware('auth');
Route::get('/event/{event:slug}', [EventsController::class, 'show'])->name('events.show');

// Add swimmers through event
Route::get('events/{event:slug}/add-swimmers', [EventsController::class, 'addSwimmers'])->name('events.add-swimmers')->middleware('auth');
Route::get('events/attach-swimmers', [EventsController::class, 'attachSwimmers'])->name('events.attach-swimmers')->middleware('auth');

// Auth
Auth::routes();
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('auth.register')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');