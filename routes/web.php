<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;
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

Route::resource('/', WelcomeController::class)
    ->only(['index']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('orders', OrderController::class)
        ->only(['index', 'store', 'show']);
    // Route::get(
    //     '/orders/{order}',
    //     [OrderController::class, 'order']
    // )->name('orders.order');
    // Route::post(
    //     '/pizzas/cart/addToOrder',
    //     [PizzaController::class, 'addToOrder']
    // )->name('pizzas.order.add');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('pizzas', PizzaController::class)
        ->only(['index', 'store']);
    Route::post(
        '/pizzas/{pizza}/addToCart',
        [PizzaController::class, 'addToCart']
    )->name('pizzas.cart.add');
    Route::get(
        '/pizzas/cart',
        [PizzaController::class, 'cart']
    )->name('pizzas.cart');
    Route::post(
        '/pizzas/cart/addToOrder',
        [PizzaController::class, 'addToOrder']
    )->name('pizzas.order.add');
});

require __DIR__ . '/auth.php';
