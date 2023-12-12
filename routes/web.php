<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CartController;
use App\Providers\AuthServiceProvider;
use App\Providers\RouteServiceProvider;
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

Route::get('/',[Controller::class, 'homepage']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::group(['prefix'=>'admin','middleware'=>['admin','verified']],function (){
    Route::get('/',[Controller::class, 'admin']);
});

Route::get('/viewproduct',[Controller::class, 'index']);
Route::get('//change/order/status/{id}',[Controller::class, 'changeOrderStatus']);
Route::get('/vieworders',[Controller::class, 'vieworders']);
Route::get('/like/{id}',[Controller::class, 'like']);
Route::get('/order/{id}',[Controller::class, 'order']);
Route::get('/product/view/{id}',[Controller::class, 'view']);
Route::get('/product/edit/{id}',[Controller::class, 'edit']);
Route::get('/addproduct',[Controller::class, 'addProduct']);
Route::post('/store/product',[Controller::class, 'store']);
Route::post('/store/order/{id}',[Controller::class, 'storeOrder']);
Route::post('/update/product/{id}',[Controller::class, 'update']);
Route::get('/change-status/{id}',[Controller::class, 'status']);
Route::get('/addtocart/{id}',[CartController::class, 'addTocart']);
Route::get('/cart',[CartController::class, 'show']);
Route::get('/veiwcart', 'AddController@seeView');
Route::get('/cart-show',[CartController::class, 'showCart']);
Route::post('/checkout',[CartController::class, 'Checkout']);
