<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'firstPage'])->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
Route::post('/login', [LoginRegisterController::class, 'loginPost'])->name('login.post');
Route::get('/register', [LoginRegisterController::class, 'registration'])->name('register');
Route::post('/register', [LoginRegisterController::class, 'registrationPost'])->name('register.post'); 
Route::get('/dashboard/agent', [AgentController::class, 'index'])->name('dashboard.agent'); 
Route::get('/dashboard/user', [UserController::class, 'index'])->name('dashboard.user'); 
// Route to show the update form
Route::get('/agent/update', [AgentController::class, 'edit'])->name('agent.edit');

// Route to handle the form submission and update the agent details
Route::post('/agent/update', [AgentController::class, 'update'])->name('agent.update');
//logout
use App\Http\Controllers\AdminController;

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/agents/{id}/approve', [AdminController::class, 'approveAgent'])->name('admin.agents.approve');
Route::post('/admin/agents/{id}/disapprove', [AdminController::class, 'disapproveAgent'])->name('admin.agents.disapprove');
use App\Http\Controllers\RatingController;

Route::post('/rate-agent', [RatingController::class, 'store'])->name('rate.agent');
Route::post('/agents/{id}/rate', [AgentController::class, 'rate'])->name('agents.rate');
Route::get('/agent/{id}/ratings', [RatingController::class, 'showRatings'])->name('agent.ratings');
// Route for submitting a rating
//Route::post('/agents/{id}/rate', [AgentController::class, 'rateAgent'])->name('agent.rate');

Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');