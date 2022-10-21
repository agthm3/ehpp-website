<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MixingController;
use App\Http\Controllers\MyTransactionController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\PakanGalleryController;
use App\Http\Controllers\PakanHitung;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/details/{slug}',[FrontendController::class, 'details'] )->name('details');


    

require __DIR__.'/auth.php';
    //middleware khusus untuk admin yang bisa masuk dan untuk cart
    Route::middleware(['auth'])->group(function(){
        // Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
        // Route::post('/cart/{id}', [FrontendController::class, 'cartAdd'])->name('cart-add');
        // Route::delete('/cart/{id}', [FrontendController::class, 'cartDelete'])->name('cart-delete');
        Route::post('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
        Route::get('/checkout/success', [FrontendController::class, 'success'])->name('checkout-success');
        

        Route::post('/cart', [CartController::class, 'cartadd'])->name('cart-add');
    
        
    });



    
Route::middleware(['auth:sanctum', 'verified'])->name('dashboard.')->prefix('dashboard')->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->name('index');  //dashboard.index

        //My transaction routing
        Route::resource('my-transaction', MyTransactionController::class)->only([
            'index', 
            'show', 
        ]);
      Route::resource('my-transaction', CartController::class)->only([
            'index', 
            'show', 
        ]);

    //middleware khusus untuk admin yang bisa masuk
    Route::middleware(['admin'])->group(function(){

        Route::get('mixing/add', [CartController::class, 'index']);
        Route::resource('mixing', MixingController::class);
        // Route::resource('mixing', CartController::class);
        Route::get('mixing-store', [MixingController::class, 'store'])->name('hitungmixing');
        Route::resource('cartadd', CartController::class)->only([
            'store',
            'index',
            'create'
        ]);
        // Route::resource('mixing', FrontendController::class);
        // Route::resource('mixing', ProductController::class);
        // // Route::resource('mixing.gallery', ProductGalleryController::class)->shallow()->only([
        // //     'index', 
        // //     'create', 
        // //     'store',
        // //     'destroy'
        // // ]);
        Route::resource('transaction', TransactionController::class)->only([
            'index', 
            'show', 
            'edit',
            'update'
            
        ]);
        Route::resource('user', UserController::class)->only([
            'index', 
            'edit',
            'update',
            'destroy'
        ]);
        Route::resource('hpp', ProductController::class)->only([
            'create',
        ]);  
        Route::resource('pakan', PakanController::class)->only([
            'index',
            'hitung',
            'edit',
            'create',
            'store',
            'destroy',
            'update',
            'show',
            
            
        ]);
       Route::resource('hitung', PakanHitung::class)->only([
            'index',
        ]);
     
        Route::resource('pakan.gallery', PakanGalleryController::class)->shallow()->only([
            'index', 
            'create', 
            'store',
            'destroy',
            'hitung'
        ]);

    });
});