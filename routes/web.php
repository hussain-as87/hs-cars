<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
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
use App\Http\Controllers\Admin\ContactController;

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
    Route::get('/home', function () {
        return view('Admin.home');
    })->name('admin.home');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('cars', CarsController::class);
    Route::resource('categories', CategoriesController::class);


    Route::prefix('advert')->group(function () {
        Route::get('/', [AdvertController::class, 'index'])->name('advert.index');
        Route::get('/edit', [AdvertController::class, 'edit'])->name('advert.edit');
        Route::put('/update', [AdvertController::class, 'update'])->name('advert.update');
    });

    Route::prefix('contacts')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
        Route::delete('/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
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

    /*  Route::put('comments-{comment}', [PostController::class, 'commnetUpdate'])->name('comment.update');
    Route::delete('comments-{comment}', [PostController::class, 'commnetDestroy'])->name('comment.destroy');
 */
    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('settings.index');
        Route::get('/{id}', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('/{id}', [SettingController::class, 'update'])->name('settings.update');
    });
});

Route::group(['middleware' => 'auth', 'prefix' => '/', 'as' => 'home.'], function () {
    Route::get('/', [CarController::class, 'index'])->name('index');
    Route::get('/about', [CarController::class, 'about'])->name('about');
    Route::get('/services', [CarController::class, 'service'])->name('services');
    Route::get('/pricing', [CarController::class, 'pricing'])->name('pricing');
    Route::get('/cars', [CarController::class, 'cars'])->name('cars');
    Route::get('/blog', [CarController::class, 'blog'])->name('blog');
    Route::get('/contact', [CarController::class, 'contact'])->name('contact');
    Route::post('/', [ContactController::class, 'store'])->name('contacts.store');
});
