<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

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


Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Сброс кэша выполнен!";
});

Route::view('/', 'home');

Route::get('/contacts', function () {
   return view('contacts');
});

Route::name('avto.')->group(function () {
    Route::get('avto_spare/spare', function () {
        return view('avto_spare/spare');
    })->name('spare');

    Route::get('avto_spare/liquids', function () {
        return view('avto_spare/liquids');
    })->name('liquids');

    Route::get('avto_spare/carParts', function () {
        return view('avto_spare/carParts');
    })->name('parts');

    Route::get('avto_spare/period_product', function () {
        return view('avto_spare/period_product');
    })->name('period_product');
});


//Route::get('admin', function () {
//    if (Auth::user()->email != 'bahilinvit@mail.ru')
//        return redirect(route('user.private'));
//    return view('admin');
//})->name('admin');


Route::name('user.')->group(function () {
    Route::view('/private', 'private')->middleware('auth')->name('private');

    Route::get('deleteOrder', function () {
       DB::table('avto_order')->where('id', $_GET['orderId'])->delete();
        DB::table('avto_spare')->where('id', $_GET['spareId'])->delete();

        return view('admin');
    })->name('deleteOrder');

    Route::get('admin', function () {
        if (Auth::user()->email != 'bahilinvit@mail.ru')
            return redirect(route('user.private'));
        return view('admin');
    })->name('admin');

    Route::get('order', function () {
       if (Auth::check()) {
           return view('order');
       }
        return view('login');
    })->name('order');

    Route::post('order', [\App\Http\Controllers\OrderController::class,'store']);

    Route::post('admin', [\App\Http\Controllers\AdminController::class, 'save']);

    Route::get('login', function () {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::post('login', [\App\Http\Controllers\LoginController::class, 'login']);

    Route::get('logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('registration', function () {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    Route::post('registration', [\App\Http\Controllers\RegisterController::class, 'save']);
});

Route::get('/', function () {
    $marka = DB::table('avto_marka')->get();
    if (isset($_GET['detailId']))
        DB::table('avto_spare')->where('id', $_GET['detailId'])->delete();
    return view('home', [
        'marka' => $marka
    ]);
});
