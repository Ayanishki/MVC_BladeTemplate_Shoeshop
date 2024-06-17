<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController as ControllersDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\login\UserController as LoginUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Sign\UserController as SignUserController;
use App\Http\Controllers\User\DetailController;
use Illuminate\Support\Facades\DB;

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

Route::group(['prefix' => ''], function() {
    Route::get('', [HomeController::class, 'index'])->name('home.index');
    Route::get('product/{proid}', [ControllersDetailController::class, 'index']);
    Route::post('product/{proid}', [ControllersDetailController::class, 'comment']);
    Route::get('contact',function (){
        return view('user.contact.index');
     })->name('contact');
});
// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/', [HomeController::class, 'index'])->name('home.index');
//     Route::get('product/{proid}', [ControllersDetailController::class, 'index']);
//     Route::post('product/{proid}', [ControllersDetailController::class, 'comment']);
// });
Route::prefix('cart') ->middleware('auth')->group(  function () {
    Route::get('', [CartController::class, 'index'])->name('cart.index');
    Route::get('add{id}', [CartController::class, 'add'])->name('cart.add');
    Route::put('update{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('remove{id}', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('update-all', [CartController::class, 'updateAll'])->name('cart.updateAll');
});

//login
Route::get('sign in', [UserController::class, 'signIn'])->name('login');
Route::post('sign in', [UserController::class, 'checkSignIn']);
//register
Route::get('sign up', [UserController::class, 'signUp'])->name('register');
Route::post('sign up', [UserController::class, 'checkSignUp']);
//logout
Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::prefix('admin') ->middleware(['auth'])-> group( function() {
    Route::get('/dashboard',function (){
        return view('adminnew.dashboard.index');
     });
    Route::resource('product', '\App\Http\Controllers\ProductController');
    Route::resource('order', '\App\Http\Controllers\OrderManagementController');
    Route::resource('color', '\App\Http\Controllers\ColorController');
    Route::resource('size', '\App\Http\Controllers\SizeController');
    Route::resource('statistical', '\App\Http\Controllers\StatisticalController');


});

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/process-order', [OrderController::class, 'processOrder'])->name('process.order');
    Route::get('/order-success', [OrderController::class, 'orderSuccess'])->name('order.success');
});

























//Admin
// Route::prefix('admin')->group(function () {
//     Route::resource('category', 'CategoryController');
//     Route::resource('brand', 'BrandController');
//     Route::resource('product', '\App\Http\Controllers\ProductController');
//     Route::resource('product/{proid}/image', '\App\Http\Controllers\ImageController');
//     Route::resource('product/{proid}/detail', '\App\Http\Controllers\ProductDetailController');
// });

















// Check connect db
Route::get('/test-db-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Connected successfully to the database!";
    } catch (\Exception $e) {
        return "Could not connect to the database. Error: " . $e->getMessage();
    }
});

Route::get('/product', function () {
    $products = DB::select('SELECT * FROM product');
    return response()->json($products);
});
