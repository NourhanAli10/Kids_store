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
use App\Http\Controllers\store\ProductDetailsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\store\CategoryController as StoreCategoryController;
use App\Http\Controllers\store\WishlistController;

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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/////////////////////////////store/////////////////////////
Route::get("/", [HomeController::class, 'index'])->name('home');
Route::get("/new-products", [HomeController::class, 'newProducts'])->name('new_products');
// Route::get("/new-products", [HomeController::class, 'newProducts'])->name('home.new_products');
Route::get("/product/{slug}", [ProductDetailsController::class, 'productDetails'])->name('product-details');
Route::get("/product-category/{slug}", [App\Http\Controllers\store\CategoryController::class, 'ProductByCategory'])->name('product-category');
Route::get("/shop/all-products", [HomeController::class, 'showAllProducts'])->name('show-all-products');


Route::get('/category/{slug}', [HomeController::class, 'CategoryProducts'])->name('category_products');




Route::get('/cart', [CartController::class, 'Cart'])->name('cart');
Route::post('/product/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');




//

Route::get('/my-account', [UserController::class, 'profilePage'])->name('user-profile');
Route::post('/change-password', [UserController::class, 'updatePassword'])->name('update-password');









Route::controller(ProductController::class)->group(function() {
    Route::get("/all-products",  'all_products')->name('all-products');
    Route::get("/new_products", 'new_products')->name('new-products');
});

// Wishlist
Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist-store');
Route::get('/wishlist/products', [WishlistController::class, 'index'])->name('wishlist-page');
Route::delete('/wishlist', [WishlistController::class, 'destroy'])->name('wishlist-delete');





















// ---------------------------Dashboard---------------------------------- //

Route::get('/admin/dashboard', [DashboardController::class , 'index'])->name('dashboard');


Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])
->name('admin.login');

Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);



Route::get('/admin/register', [RegisteredUserController::class , 'create'])->name('admin.register');
Route::post('/admin/register', [RegisteredUserController::class , 'store']);

Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])
->name('admin.logout');


// Products//

Route::controller(ProductController::class)->prefix('admin/dashboard/')->name('dashboard.')
->group(function() {
    Route::get('/all-products', 'index')->name('all_products');
    Route::get('/products/add', 'create')->name('create_product');
    Route::post('/products/add', 'store');
});


//categories//

Route::controller(CategoryController::class)->prefix('admin/dashboard')->name('admin.')
->group(function() {
    Route::get("/categories",'index')->name('categories');
    Route::get("/categories/add", 'create')->name('add-category');
    Route::post("/categories/add", 'store');
    Route::get("/categories/edit/{id}", 'edit')->name('update-category');
    Route::put("/categories/edit/{id}", 'update');
    Route::delete("/categories/delete/{id}", 'destroy')->name('delete-category');
});


Route::controller(BrandController::class)->prefix('admin/dashboard')->name('dashboard.')
->group(function() {
    Route::get("/brands",'index')->name('all-brands');
    Route::get("/brands/add", 'create')->name('add-brand');
    Route::post("/brands/add", 'store');
    Route::get("/brands/edit/{id}", 'edit')->name('update-brand');
    Route::put("/brands/edit/{id}", 'update');
    Route::delete("/brands/delete/{id}", 'destroy')->name('delete-brand');
});


Route::controller(ColorController::class)->prefix('admin/dashboard')->name('dashboard.')
->group(function() {
    Route::get("/colors/all",'index')->name('all-colors');
    Route::get("/colors/add", 'create')->name('add-color');
    Route::post("/colors/add", 'store');
    Route::get("/colors/edit/{id}", 'edit')->name('update-color');
    Route::put("/colors/edit/{id}", 'update');
    Route::delete("/colors/delete/{id}", 'destroy')->name('delete-color');
});



Route::controller(SizeController::class)->prefix('admin/dashboard')->name('dashboard.')
->group(function() {
    Route::get("/size/all",'index')->name('all-sizes');
    Route::get("/size/add", 'create')->name('add-size');
    Route::post("/size/add", 'store');
    Route::get("/size/edit/{id}", 'edit')->name('update-size');
    Route::put("/size/edit/{id}", 'update');
    Route::delete("/size/delete/{id}", 'destroy')->name('delete-size');
});

// Route::controller(UserController::class)->prefix('admin/dashboard')->name('dashboard.')
// ->group(function() {

//     Route::get('/all-users')->

// });





