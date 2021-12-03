<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use App\Models\Invoice;
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


// Route::get('/', function () {
 
// });
Route::get('/',[PublicController::class,'index']);
Route::post('/',[PublicController::class,'show_product'])->name('consulta');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/products',ProductController::class);
    Route::resource('/buyers',BuyerController::class);
    Route::resource('/invoices', InvoiceController::class);
    
    Route::post('/invoices/complete/{invoice}', [InvoiceController::class, 'completeSend'])->name('invoices.complete');

    Route::resource('/invoice-details', InvoiceDetailController::class);
    
    Route::get('/invoices/add-product/{invoice}/', [InvoiceDetailController::class, 'create'])->name('invoices.add_products');
});