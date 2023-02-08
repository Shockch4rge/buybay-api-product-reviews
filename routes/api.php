<?php

use App\Http\Controllers\ProductReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResources([
    "product-reviews" => ProductReviewController::class,
]);

Route::get("/product/{id}/reviews", [ProductReviewController::class, "productReviews"]);
Route::post("/reset", [ProductReviewController::class, "reset"]);
