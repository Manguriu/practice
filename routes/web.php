<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\helloController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

//category controller
Route::get('/category/all', [CategoryController::class, 'AllCat']) ->name('all.category');

// routing store  category
Route::POST('/category/add', [CategoryController::class, 'AddCat']) ->name('store.category');

//edit category route
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

//update category route
Route::POST('/category/update/{id}', [CategoryController::class, 'Update']);

//delete category route
Route::get('/category/delete/{id}', [CategoryController::class, 'Delete']);

//retore a trashed category
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

//parmanent delete category
Route::get('/category/parmanent/{id}', [CategoryController::class, 'deleteParmanently']);



// brand route (controller)
Route::get('/brand/all', [BrandController::class, 'AllBrand']) ->name('all.brand');

// add brands/ images
Route::POST('/brand/add', [BrandController::class, 'AddBrand']) ->name('store.brand');

// edit brand
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
//update brand 
Route::POST('/brand/update/{id}', [BrandController::class, 'Update']);

//delete brand route
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);



// Route::get('/hello', function () {
//     return view('hello');
// });

Route::get('/hello', [helloController::class, 'index']) ->name('ello');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // $users = User::all();
        $users = DB::table('users')-> get();
        return view('dashboard', compact('users'));
    })->name('dashboard');
});