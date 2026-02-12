<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - Yummilicious SSP2
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|--------------------------------------------------------------------------
| Public API Routes
|--------------------------------------------------------------------------
*/

// API Login: Use this in Postman to get a token!
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();

    if (! $user || ! \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('postman-token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user' => $user
    ]);
});

// Get full product menu (accessible to anyone)
Route::get('/menu', function () {
    return Product::orderBy('category')
                  ->orderBy('name')
                  ->get();
})->name('api.menu');

/*
|--------------------------------------------------------------------------
| Protected API Routes (Require Authentication via Sanctum)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    // Get authenticated user's info
    Route::get('/user', function (Request $request) {
        return response()->json([
            'message' => 'Authenticated user info',
            'user' => $request->user(),
        ]);
    })->name('api.user');

    // Get authenticated user's orders (placeholder)
    Route::get('/user/orders', function (Request $request) {
        return response()->json([
            'message' => 'User orders - authenticated user only',
            'user_id' => $request->user()->id,
            'orders' => [], // You can replace with real orders from Order model later
        ]);
    })->name('api.user.orders');
});
