<?php

use App\Domain\Auth\Actions\LoginAction;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('guest')->group(function (Router $router) {
    $router->post('/auth/login', LoginAction::class);
});

Route::any('/auth/logout', function () {
    Auth::logout();
    session()->flush();

    return redirect('/');
});

Route::view('/{path?}', 'app')->where('path', '.*');
