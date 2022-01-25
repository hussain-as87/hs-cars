<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CarsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;

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

Auth::routes();


Route::group(['middleware' => 'auth', 'prefix' => 'AdminDashboard/'], function () {
    Route::get('/home', function(){
        return view('Admin.home');
    })->name('admin.home');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('cars', CarsController::class)->except('show');
    Route::resource('services', CarsController::class)->except('show');


    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/edit', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::prefix('about')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('about.index');
        Route::get('/edit', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('/edit', [AboutController::class, 'update'])->name('about.update');
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
    Route::prefix('about')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('about.index');
        Route::get('/{id}', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('/{id}', [AboutController::class, 'update'])->name('about.update');
    });
});

Route::group(['middleware'=>'auth','prefix'=>'/','name'=>'home.'],function(){
    Route::get('/',[HomeController::class,'index'])->name('index');
});
