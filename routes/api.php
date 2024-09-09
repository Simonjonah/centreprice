<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\SubscriptionController;

use App\Models\Subscription;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/', function(){
//  return 'API';
// });
// Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
Route::post('pay', [FlutterwaveController::class, 'initialize']);

Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');


Route::apiResource('post', PostController::class);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::post('buy', [SubscriptionController::class, 'makeApiRequest']);


// Route::post('/buyer', [SubscriptionController::class, 'buyProduct'])->name('buy.product');
// Route::post('create', [MuserController::class, 'creat_user']);
// Route::delete('delete/{id}', [MuserController::class, 'delete_user']);
