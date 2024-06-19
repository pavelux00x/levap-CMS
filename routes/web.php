<?php

use App\Http\Controllers\AiController;
use App\Http\Controllers\Auth\TwoFactorController;
use App\Http\Controllers\SendEmailController;
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

Route::get('/', function () {
    return view('codischool_index');
})->name('index');

Route::fallback(function (){
    return redirect()->route('login');
});

Route::post('/send-ai', [AiController::class, 'sendChatMessage']);
Route::post('/mark-all-as-deleted', [AiController::class, 'markAllAsDeleted'])->name('mark-all-as-deleted');
Route::get('/2fa', [TwoFactorController::class,'index'])->name('2fa.index');
Route::post('/2fa', [TwoFactorController::class,'store'])->name('2fa.post');
Route::post('/send-email', [SendEmailController::class, 'sendEmail'])->name('send.email');

require_once __DIR__.'/auth.php';
require_once __DIR__.'/admin.php';
require_once __DIR__.'/vendor.php';
require_once __DIR__.'/profile.php';
require_once __DIR__.'/user.php';
require_once __DIR__.'/brand.php';
require_once __DIR__.'/category.php';
require_once __DIR__.'/sub_category.php';
require_once __DIR__.'/product.php';
require_once __DIR__.'/coupon.php';
require_once __DIR__.'/notifications.php';
require_once __DIR__.'/socialite.php';

