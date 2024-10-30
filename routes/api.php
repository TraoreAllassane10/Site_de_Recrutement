<?php

use App\Http\Controllers\Api\CandidatureController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EntrepriseController;
use App\Http\Controllers\Api\OffreController;
use App\Http\Controllers\Api\UserController;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post("/register", [UserController::class, "register"]);
Route::post("/login", [UserController::class, "login"]);

Route::get('/entreprises', [EntrepriseController::class, 'index']);
Route::post("entrepises/store", [EntrepriseController::class, 'store']);
Route::get("entrepises/{id}/show", [EntrepriseController::class, 'show']);
Route::put("entrepises/{id}/update", [EntrepriseController::class, 'update']);
Route::delete("entrepises/{id}/delete", [EntrepriseController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/offres', [OffreController::class, 'index']);
Route::post("offres/store", [OffreController::class, 'store']);
Route::get("offres/{id}/show", [OffreController::class, 'show']);
Route::put("offres/{id}/update", [OffreController::class, 'update']);
Route::delete("offres/{id}/delete", [OffreController::class, 'destroy']);

Route::post("candidatures/store", [CandidatureController::class, 'store']);
Route::get("candidatures/{id}/show", [CandidatureController::class, 'show']);
Route::put("candidatures/{id}/update", [CandidatureController::class, 'update']);
Route::delete("candidatures/{id}/delete", [CandidatureController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
