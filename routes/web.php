<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\PageController::class, 'home'])->name('pages.home');
Route::get('/home', [App\Http\Controllers\PageController::class, 'home'])->name('pages.home');
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('pages.contact');
Route::get('/service', [App\Http\Controllers\PageController::class, 'service'])->name('pages.service');
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('pages.about');

Route::get('/carts', [App\Http\Controllers\CartController::class, 'index'])->middleware('auth')->name('carts.index');
Route::post('/carts/{product}', [App\Http\Controllers\CartController::class, 'store'])->middleware('auth')->name('carts.store');
Route::delete('/carts/{cart}', [App\Http\Controllers\CartController::class, 'destroy'])->middleware('auth')->name('carts.destroy');
Route::put('/carts/{cart}/qty', [App\Http\Controllers\CartController::class, 'updateQuantity'])->middleware('auth')->name('carts.update.qty');
//order
Route::post('/orders', [App\Http\Controllers\OrderController::class, 'store'])->middleware('auth')->name('orders.store');
//booking
Route::get('/booking_tables', [App\Http\Controllers\BookingTableController::class, 'index'])->name('bookingTables.index');
Route::post('/booking_tables', [App\Http\Controllers\BookingTableController::class, 'store'])->middleware('auth')->name('pages.bookingTables.store');

Auth::routes();

Route::group([
    'prefix' => 'backends',
    'middleware' => ['auth']
], function () {
    Route::get('/dashboards', [App\Http\Controllers\Backends\DashboardController::class, 'index'])->name('backends.dashboards.index');
    Route::get('/accountusers/personal-info', [App\Http\Controllers\Backends\UserController::class, 'personal_info'])->name('backends.accountusers.index');

    Route::get('/myReserves', [App\Http\Controllers\Backends\ReserveController::class, 'my_reserve'])->name('backends.myReserves.index');
    Route::get('/myReserves/{reserve}/edit', [App\Http\Controllers\Backends\ReserveController::class, 'edit'])->name('backends.myReserves.edit');
    //{{ route('backends.myReserves.edit', $reserve) }} ====form edit====$reserve=======>/myReserves/{reserve}
    Route::put('/myReserves/{reserve}', [App\Http\Controllers\Backends\ReserveController::class, 'update'])->name('backends.myReserves.update');
    Route::delete('/myReserves/{reserve}', [App\Http\Controllers\Backends\ReserveController::class, 'destroy'])->name('backends.myReserves.delete');

    Route::get('/products', [App\Http\Controllers\Backends\ProductController::class, 'index'])->name('backends.products.index');  // Listing all products
    Route::get('/products/create', [App\Http\Controllers\Backends\ProductController::class, 'create'])->name('backends.products.create');  // Form to create a new product
    Route::post('/products', [App\Http\Controllers\Backends\ProductController::class, 'store'])->name('backends.products.store');  // Store the new product in the database
    Route::get('/products/{product}/edit', [App\Http\Controllers\Backends\ProductController::class, 'edit'])->name('backends.products.edit');  // Form to edit an existing product
    Route::put('/products/{product}', [App\Http\Controllers\Backends\ProductController::class, 'update'])->name('backends.products.update');  // Update an existing product
    Route::delete('/products/{product}', [App\Http\Controllers\Backends\ProductController::class, 'destroy'])->name('backends.products.delete');  // Delete a product
    Route::get('/products/{product}', [App\Http\Controllers\Backends\ProductController::class, 'show'])->name('backends.products.show');  // Show a single product's details




});

Route::group([
    'middleware' => ['backend']
], function () {
    Route::get('/users', [App\Http\Controllers\Backends\UserController::class, 'index'])->name('backends.users.index');
    Route::get('/users/create', [App\Http\Controllers\Backends\UserController::class, 'create'])->name('backends.users.create');
    Route::post('/users', [App\Http\Controllers\Backends\UserController::class, 'store'])->name('backends.users.store');
    Route::get('/users/{user}/edit', [App\Http\Controllers\Backends\UserController::class, 'edit'])->name('backends.users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\Backends\UserController::class, 'update'])->name('backends.users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\Backends\UserController::class, 'destroy'])->name('backends.users.delete');
    Route::group([
        'prefix' => 'categories'
    ], function () { //​ Means-> backends/categories
        Route::get('/', [App\Http\Controllers\Backends\CategoryController::class, 'index'])->name('backends.categories.index');
        Route::get('/create', [App\Http\Controllers\Backends\CategoryController::class, 'create'])->name('backends.categories.create');
        Route::post('/', [App\Http\Controllers\Backends\CategoryController::class, 'store'])->name('backends.categories.store');
        Route::get('/{category}/edit', [App\Http\Controllers\Backends\CategoryController::class, 'edit'])->name('backends.categories.edit');
        Route::put('/{category}', [App\Http\Controllers\Backends\CategoryController::class, 'update'])->name('backends.categories.update');
        Route::delete('/{category}', [App\Http\Controllers\Backends\CategoryController::class, 'destroy'])->name('backends.categories.delete');
    });
    Route::resource('products', App\Http\Controllers\Backends\ProductController::class, [
        'as' => 'backends'
    ]);
    Route::resource('tables', App\Http\Controllers\Backends\TableController::class, [
        'as' => 'backends'
    ]);
    Route::resource('booking', App\Http\Controllers\Backends\BookingController::class, [
        'as' => 'backends'
    ]);
});
