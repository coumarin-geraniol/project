<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::get('/posts', 'Post\IndexController')->name('admin.post.index');

    Route::get('/servers', 'Server\IndexController')->name('admin.server.index');
    Route::get('/servers/{server}/edit', 'Server\EditController')->name('admin.server.edit');
    Route::patch('/servers/{server}', 'Server\UpdateController')->name('admin.server.update');


    $models = [
        ['cpu', 'cpus'],
        ['daire', 'daires'],
        ['disk', 'disks'],
        ['mudurluk', 'mudurluks'],
        ['ram', 'rams'],
        ['system', 'systems'],
        ['category', 'categories'],
    ];

    foreach ($models as $model) {
        $routeName = $model[0];
        $routePlural = $model[1];

        Route::get("/{$routePlural}", "{$routeName}\IndexController")->name("admin.{$routeName}.index");
        Route::get("/{$routePlural}/create", "{$routeName}\CreateController")->name("admin.{$routeName}.create");
        Route::post("/{$routePlural}", "{$routeName}\StoreController")->name("admin.{$routeName}.store");
        Route::get("/{$routePlural}/{{$routeName}}/edit", "{$routeName}\EditController")->name("admin.{$routeName}.edit");
        Route::patch("/{$routePlural}/{{$routeName}}", "{$routeName}\UpdateController")->name("admin.{$routeName}.update");
        Route::delete("/{$routePlural}/{{$routeName}}", "{$routeName}\DestroyController")->name("admin.{$routeName}.delete");
    }
});



Route::group(['namespace' => 'App\Http\Controllers\User', 'prefix' => 'user', 'middleware' => 'user'], function () {
    Route::get('/posts/create', 'Post\CreateController')->name('user.post.create');
    Route::post('/posts', 'Post\StoreController')->name('user.post.store');

    Route::get('/servers', 'Server\IndexController')->name('user.server.index');
    Route::get('/servers/create', 'Server\CreateController')->name('user.server.create');
    Route::post('/servers', 'Server\StoreController')->name('user.server.store');
    Route::get('/servers/{server}/edit', 'Server\EditController')->name('user.server.edit');
    Route::patch('/servers/{server}', 'Server\UpdateController')->name('user.server.update');
    Route::delete('/servers/{server}', 'Server\DestroyController')->name('user.server.delete');

});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

