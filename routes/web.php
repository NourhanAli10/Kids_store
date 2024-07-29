<?php



use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\store\CartController;
use App\Http\Controllers\store\CategoryController;
use App\Http\Controllers\store\HomeController;
use App\Http\Controllers\store\OrderController;
use App\Http\Controllers\store\ProductDetailsController;
use App\Http\Controllers\store\UserController;
use App\Http\Controllers\store\WishlistController;
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




Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/my-account', [UserController::class, 'profilePage'])->name('user-profile');
    Route::post('/change-password', [UserController::class, 'updatePassword'])->name('update-password');
    Route::get('/wishlist/products', [WishlistController::class, 'index'])->name('wishlist-page');
    Route::delete('/wishlist', [WishlistController::class, 'destroy'])->name('wishlist-delete');
});


require __DIR__ . '/auth.php';

/////////////////////////////store/////////////////////////
Route::get("/", [HomeController::class, 'index'])->name('home');
Route::get("/new-products", [HomeController::class, 'newProducts'])->name('new_products');
// Route::get("/new-products", [HomeController::class, 'newProducts'])->name('home.new_products');
Route::get("/product/{slug}", [ProductDetailsController::class, 'productDetails'])->name('product-details');
Route::get("/product-category/{slug}", [CategoryController::class, 'ProductByCategory'])->name('product-category');
Route::get("/shop/all-products", [HomeController::class, 'showAllProducts'])->name('show-all-products');


Route::get('/category/{slug}', [HomeController::class, 'CategoryProducts'])->name('category_products');




Route::get('/cart', [CartController::class, 'Cart'])->name('cart');
Route::post('/product/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');

Route::controller(ProductController::class)->group(function () {
    Route::get("/all-products",  'all_products')->name('all-products');
    Route::get("/new_products", 'new_products')->name('new-products');
});

// Wishlist





Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist-store');
Route::get('/orders', [OrderController::class, 'index'])->name('checkout');
Route::post('/orders', [OrderController::class, 'placeOrder'])->name('checkout.place-order');
Route::post('/my-account/update-user/{id}', [UserController::class, 'UpdateProfile'])->name('update-user');
Route::post('/my-account/store-address', [UserController::class, 'StoreAddress'])->name('store-address');















