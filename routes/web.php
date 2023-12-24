<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthorController;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\UserbooklistController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [PublicController::class, 'index']);

//Route khusus tamu
Route::middleware('only_guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);
    Route::get('register', [RegisterController::class, 'index']);
    Route::post('register', [RegisterController::class, 'store']);
});

//Route khusus admin 
Route::middleware('only_admin')->group(function () {
        //crud book
        Route::resource('books', BookController::class) ;
        Route::get('/dashboard', [DashboardController::class, 'index']);
        
        //route crud category
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::get('addcategory', [CategoryController::class, 'addcategory']);
        Route::post('addcategory', [CategoryController::class, 'store']);
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
        Route::get('category-delete/{slug}', [CategoryController::class, 'destroy']);
        Route::get('category-restore', [CategoryController::class, 'restore']);
        Route::get('category-restore/{slug}', [CategoryController::class, 'restorecategory']);
        
        //route crud author
        Route::resource('author', AuthorController::class);

        //route crud publisher
        Route::resource('/publisher', PublisherController::class);

         //crud user
        Route::get('/users', [ProfileController::class, 'user']);
        Route::get('/detail-user/{slug}', [ProfileController::class, 'show']);
        Route::get('user-approve/{slug}', [ProfileController::class, 'approve']);
        Route::get('/registerUser', [ProfileController::class, 'registerUser']);
        Route::get('user-delete/{slug}', [ProfileController::class, 'destroy']);
        Route::get('user-restore', [ProfileController::class, 'restore']);
        Route::get('user-restore/{slug}', [ProfileController::class, 'userrestore']);

        Route::get('book-rent',[BookRentController::class ,'index']);
        Route::post('book-rent',[BookRentController::class ,'store']);
        Route::get('book-return',[ReturnController::class, 'index']);
        Route::post('book-return',[ReturnController::class,'ReturnBook']);

        Route::get('rent', [RentController::class, 'index'])->middleware('only_admin');
});

    //route khusus user
        Route::middleware('auth')->group(function () {
            Route::get('logout', [LoginController::class, 'logout']);
            Route::get('profile', [ProfileController::class, 'index'])->middleware('profile');
            Route::get('user-book-list',[UserbooklistController::class, 'booklist'])->middleware('profile');
            
    });