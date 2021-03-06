<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdvertController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoriesController;

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

Route::get('/change-language/{locale}', [LocaleController::class, 'switch'])->name('change.language');

Route::get('/404', function () {
    return view('404');
})->name('error-404');
Route::get('/500', function () {
    return view('500');
})->name('error-500');

Route::post('/dark', [HomeController::class, 'change_them_dark'])->name('change.them.dark');
Route::post('/light', [HomeController::class, 'change_them_light'])->name('change.them.light');

Auth::routes();


Route::group(['middleware' => 'auth', 'prefix' => 'AdminDashboard/'], function () {
    Route::get('/home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class)->except('destroy');
    Route::get('/user/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/user/trash', [UserController::class, 'trash'])->name('users.trash');
    Route::get('/user/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
    Route::get('/user/forceDelete/{id}', [UserController::class, 'forceDelete'])->name('users.forceDelete');

    Route::resource('cars', CarsController::class)->except('destroy');
    Route::get('/car/{id}/destroy', [CarsController::class, 'destroy'])->name('cars.destroy');
    Route::get('/car/trash', [CarsController::class, 'trash'])->name('cars.trash');
    Route::get('/car/restore/{id}', [CarsController::class, 'restore'])->name('cars.restore');
    Route::get('/car/forceDelete/{id}', [CarsController::class, 'forceDelete'])->name('cars.forceDelete');

    Route::resource('categories', CategoriesController::class)->except('destroy');
    Route::get('/category/{id}/destroy', [CategoriesController::class, 'destroy'])->name('categories.destroy');
    Route::get('/category/trash', [CategoriesController::class, 'trash'])->name('categories.trash');
    Route::get('/category/restore/{id}', [CategoriesController::class, 'restore'])->name('categories.restore');
    Route::get('/category/forceDelete/{id}', [CategoriesController::class, 'forceDelete'])->name('categories.forceDelete');

    Route::prefix('advert')->group(function () {
        Route::get('/', [AdvertController::class, 'index'])->name('advert.index');
        Route::get('/edit', [AdvertController::class, 'edit'])->name('advert.edit');
        Route::put('/update', [AdvertController::class, 'update'])->name('advert.update');
    });

    Route::prefix('contacts')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
        Route::delete('/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    });

    Route::prefix('rent')->group(function () {
        Route::get('/', [RentController::class, 'index'])->name('rent.index');
        Route::delete('/{id}', [RentController::class, 'destroy'])->name('rent.destroy');
    });

    Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/store', [ServiceController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [ServiceController::class, 'destroy'])->name('destroy');
    });


    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/edit', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::prefix('about')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('about.index');
        Route::get('/edit', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('/update', [AboutController::class, 'update'])->name('about.update');
    });

    Route::prefix('posts')->group(function () {
        Route::post('/', [PostController::class, 'store'])->name('posts.store');
        Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    });


    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('settings.index');
        Route::get('/{id}', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('/{id}', [SettingController::class, 'update'])->name('settings.update');
    });
});

Route::group(['prefix' => '/', 'as' => 'home.'], function () {
    Route::get('/', [CarController::class, 'index'])->name('index');
    Route::get('/car-{id}', [CarController::class, 'single_car'])->name('single.car');
    Route::get('/about', [CarController::class, 'about'])->name('about');
    Route::get('/services', [CarController::class, 'service'])->name('services');
    Route::get('/pricing', [CarController::class, 'pricing'])->name('pricing');
    Route::get('/cars', [CarController::class, 'cars'])->name('cars');
    Route::get('/contact', [CarController::class, 'contact'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/rent-{id}', [RentController::class, 'rent_home'])->name('rent');
    Route::post('/rent', [RentController::class, 'store'])->name('rent.store');
});
