<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\store\CartController;
use App\Http\Controllers\store\HomeController;
use App\Http\Controllers\store\UserController;
use App\Http\Controllers\dashboard\SizeController;
use App\Http\Controllers\dashboard\BrandController;
use App\Http\Controllers\dashboard\ColorController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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







// ---------------------------Dashboard---------------------------------- //

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('admin.logout');

    // Products//
    Route::controller(ProductController::class)->prefix('admin/dashboard/')->name('dashboard.')
        ->group(function () {
            Route::get('/all-products', 'index')->name('all_products');
            Route::get('/products/add', 'create')->name('create_product');
            Route::post('/products/add', 'store');
            Route::get("/produc/edit/{id}", 'edit')->name('update-product');
            Route::put("/product/edit/{id}", 'update');
            Route::delete("/product/delete/{id}", 'destroy')->name('delete-product');
        });


    //categories//

    Route::controller(CategoryController::class)->prefix('admin/dashboard')->name('admin.')
        ->group(function () {
            Route::get("/categories", 'index')->name('categories');
            Route::get("/categories/add", 'create')->name('add-category');
            Route::post("/categories/add", 'store');
            Route::get("/categories/edit/{id}", 'edit')->name('update-category');
            Route::put("/categories/edit/{id}", 'update');
            Route::delete("/categories/delete/{id}", 'destroy')->name('delete-category');
        });


    Route::controller(BrandController::class)->prefix('admin/dashboard')->name('dashboard.')
        ->group(function () {
            Route::get("/brands", 'index')->name('all-brands');
            Route::get("/brands/add", 'create')->name('add-brand');
            Route::post("/brands/add", 'store');
            Route::get("/brands/edit/{id}", 'edit')->name('update-brand');
            Route::put("/brands/edit/{id}", 'update');
            Route::delete("/brands/delete/{id}", 'destroy')->name('delete-brand');
        });


    Route::controller(ColorController::class)->prefix('admin/dashboard')->name('dashboard.')
        ->group(function () {
            Route::get("/colors/all", 'index')->name('all-colors');
            Route::get("/colors/add", 'create')->name('add-color');
            Route::post("/colors/add", 'store');
            Route::get("/colors/edit/{id}", 'edit')->name('update-color');
            Route::put("/colors/edit/{id}", 'update');
            Route::delete("/colors/delete/{id}", 'destroy')->name('delete-color');
        });



    Route::controller(SizeController::class)->prefix('admin/dashboard')->name('dashboard.')
        ->group(function () {
            Route::get("/size/all", 'index')->name('all-sizes');
            Route::get("/size/add", 'create')->name('add-size');
            Route::post("/size/add", 'store');
            Route::get("/size/edit/{id}", 'edit')->name('update-size');
            Route::put("/size/edit/{id}", 'update');
            Route::delete("/size/delete/{id}", 'destroy')->name('delete-size');
        });
});




Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])
    ->name('admin.login');

Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);



Route::get('/admin/register', [RegisteredUserController::class, 'create'])->name('admin.register');
Route::post('/admin/register', [RegisteredUserController::class, 'store']);
