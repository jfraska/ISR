<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\OrganizationalController;
use App\Http\Controllers\PostController;
use App\Livewire\Navigation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/berita-terkini', [HomeController::class, 'berita'])->name('berita-terkini');
Route::get('/artikel-terkini', [HomeController::class, 'artikel'])->name('artikel-terkini');
Route::get('/mini-blog', [HomeController::class, 'blog'])->name('mini-blog');
Route::get('/department/{department:slug}', [DepartmentController::class, 'show'])->name('departments.show');
Route::get('/abouts/{organizational:slug}', [OrganizationalController::class, 'show'])->name('abouts.show');

Route::get('/merchandise', [MerchandiseController::class, 'index'])->name('merchandise.index');
Route::get('/merchandise/{merchandise:slug}', [MerchandiseController::class, 'show'])->name('merchandise.show');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
