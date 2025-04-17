<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webapp\WishlistController;
use App\Http\Controllers\Webapp\OrderController;
use App\Http\Controllers\Webapp\CouponController;
use App\Http\Controllers\Webapp\UserController;
use App\Http\Controllers\Webapp\ScratchCardController;
use App\Http\Controllers\Webapp\DiscoverController;
use App\Http\Controllers\Webapp\CategoryController;
use App\Http\Controllers\Webapp\FavouriteController;
use App\Http\Controllers\Webapp\AdminController;
use App\Http\Controllers\Webapp\HomeController;
use App\Http\Controllers\Webapp\ProductController;
use App\Http\Controllers\Webapp\CartController;
use App\Http\Controllers\Webapp\CheckoutController;
use App\Http\Controllers\webapp\NotificationController;
use App\Http\Controllers\Webapp\BrandsController;
use App\Http\Controllers\Webapp\AddressController;
use App\Http\Controllers\Webapp\AddNewAddressController;
use App\Http\Controllers\Webapp\ConsentManagementController;
use App\Http\Controllers\Webapp\TermsPoliciesController;
use App\Http\Controllers\Webapp\FaqController;
use App\Http\Controllers\Webapp\QrcodeController;
use App\Http\Controllers\Webapp\SuccessfullyOrderedController;




//Define routes for pages
Route::get('/discover', function () { return view('discover'); })->name('discover');
Route::get('/cart', function () { return view('cart'); })->name('cart');
Route::get('/profile', function () { return view('profile'); })->name('profile');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
Route::get('/order-history', [OrderController::class, 'history'])->name('order-history');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/scratch-cards', [ScratchCardController::class, 'index'])->name('scratch_cards');
Route::get('/discover', [DiscoverController::class, 'index'])->name('discover');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/sub_categories', [CategoryController::class, 'subCategories'])->name('sub_categories');
Route::get('/favourite', [FavouriteController::class, 'index'])->name('favourite');
Route::get('/', [AdminController::class, 'index'])->name('admin');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/brands', [BrandsController::class, 'index'])->name('brands');
Route::get('/brands/sub_brands', [BrandsController::class, 'subbrands'])->name('sub_brands');

// ✅ Address routes
Route::get('/address', [AddressController::class, 'index'])->name('address');
Route::get('/addnewaddress', [AddNewAddressController::class, 'index'])->name('addnewaddress');
Route::post('/save-address', [AddNewAddressController::class, 'store'])->name('saveaddress');

Route::get('/editaddress/{id}', [EditAddressController::class, 'index'])->name('editaddress');
Route::post('/editaddress/update', [EditAddressController::class, 'update'])->name('editaddress.update');

// Routes for managing selected address
Route::post('/address/save-selected', [AddressController::class, 'saveSelectedAddress'])->name('address.save');
Route::get('/address/add', [AddNewAddressController::class, 'index'])->name('address.add');
Route::post('/address/save', [AddNewAddressController::class, 'store'])->name('address.store');
Route::delete('/address/delete/{id}', [AddressController::class, 'destroy'])->name('address.delete');


//Cart
route::get('/cart', [CartController::class, 'index'])->name('cart');
route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add'); 
Route::get('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');

// ✅ Product & Checkout
Route::get('/product/id/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/notification', [NotificationController::class, 'index'])->name('notification');
Route::post('/checkout/apply-coupon', [CheckoutController::class, 'apply'])->name('apply.coupon');
Route::post('/checkout', [CheckoutController::class, 'apply'])->name('checkout.apply');

//profile
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs');
Route::get('/terms-policies', [TermsPoliciesController::class, 'index'])->name('terms-policies');
Route::get('/consent-management', [ConsentManagementController::class, 'index'])->name('consent-management');
Route::get('/scratch-cards', [ScratchCardController::class, 'showScratchCards'])->name('scratch_cards');
Route::get('/coupons', [CouponController::class, 'coupon'])->name('coupons');


Route::get('/allcategories', function () {
    return view('allcategories');
})->name('allcategories');


// ✅ Successfully Ordered
Route::get('/successfully-ordered', [SuccessfullyOrderedController::class, 'index'])->name('successfullyordered');
Route::get('/order/success', [SuccessfullyOrderedController::class, 'index'])->name('SuccessfullyOrdered');
 
 
// ✅ QR Code
Route::get('/Qrcode', [QrcodeController::class, 'index'])->name('Qrcode');
Route::get('/Qrcode', function () {
    return view('webapp.Qrcode');
})->name('Qrcode');
 

 
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('placeOrder');
//Route::get('/order-success/{order}', [OrderController::class, 'orderSuccess'])->name('SuccessfullyOrdered');
Route::get('/order-success/{id}', [OrderController::class, 'success'])->name('order.success');
Route::post('/place-order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order-history', [OrderController::class, 'history'])->name('order-history');
Route::get('/successfully-ordered', [SuccessfullyOrderedController::class, 'index'])->name('successfully.ordered');

 

