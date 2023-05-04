<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\helloController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PasswordController;
use App\Models\User;
use App\Models\MultiplePic;
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
    //data fetching for display to homepage/frontend
    //querry Builder
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $multipic = DB::table('multiple_pics')->get();


    return view('home', compact('brands','abouts', 'multipic'));
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

// route to dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // $users = User::all();
        // $users = DB::table('users')-> get();
        return view('admin.index');
    })->name('dashboard');
});


// multi image route
Route::get('/multi/image', [BrandController::class, 'ImageMulti']) ->name('images.multi');

// adding multiple images  
Route::POST('/image/add', [BrandController::class, 'AddImage']) ->name('store.image');

Route::get('send-mail', function () {

   

    $details = [

        'title' => 'Mail from ItSolutionStuff.com',

        'body' => 'This is for testing email using smtp'

    ];

   

    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));

   

    dd("Email is Sent.");

});

// email verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/user/logout', [BrandController::class, 'Logout']) ->name('user.logout');

//admin home slider all route
Route::get('/home/slider', [HomeController::class, 'HomeSlider']) ->name('home.slider');
//to slider add page
Route::get('/slider/add', [HomeController::class, 'AddSlider']) ->name('slider.add');
//create slider data and store to the DB
Route::POST('/slider/add', [HomeController::class, 'SliderAdd']) ->name('store.slider');
//slider edit
Route::get('/slider/edit/{id}', [HomeController::class, 'Edit']);
//slider update
Route::POST('/slider/update/{id}', [HomeController::class, 'Update']);
//slider delete
Route::get('/slider/delete/{id}', [HomeController::class, 'Delete']);



// Home About
Route::get('/home/about', [AboutController::class, 'About']) ->name('home.about');
//add about info
Route::get('/about/add', [AboutController::class, 'AddAbout']) ->name('about.add');
//to store the about data
Route::POST('/about/store', [AboutController::class, 'AboutStore']) ->name('about.store');
//edit about info
Route::get('/about/edit/{id}', [AboutController::class, 'Edit']);
//update about info
Route::POST('/about/update/{id}', [AboutController::class, 'Update']);
//delete about info
Route::get('/about/delete/{id}', [AboutController::class, 'Delete']);


//portfolio page route
Route::get('/portfolio', [AboutController::class, 'PortF']) ->name('portfolio');

// admin conatct page
Route::get('/conatact/profile', [ContactController::class, 'ContactP']) ->name('contact.profile');
//add contact
Route::get('/contact/add', [ContactController::class, 'AddContact']) ->name('add.Contact');
//store add
Route::POST('/contact/store', [ContactController::class, 'ContactStore']) ->name('contact.add');
// contact route frontend route page
Route::get('/contact', [ContactController::class, 'ContactH']) ->name('contact');
//contact form submit
Route::POST('/contact/form', [ContactController::class, 'ContactForm']) ->name('contact.form');

// route to contact message
Route::get('/contact/message', [ContactController::class, 'ContactMessage']) ->name('contact.message');

// delete message
Route::get('/message/delete/{id}', [ContactController::class, 'Delete']);


//change password and user profile
Route::get('/change/password', [PasswordController::class, 'ChangePassword']) ->name('change.password');


Route::POST('/password/update', [PasswordController::class, 'UpdatePassword']) ->name('password.update');
//user profile change


Route::get('/change/profile', [PasswordController::class, 'profilePassword']) ->name('change.profile');

Route::POST('/user/update', [PasswordController::class, 'UpdateUser']) ->name('userP.update');
