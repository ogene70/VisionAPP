<?php

use App\Http\Controllers\ContratController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// USER COLLABORATEUR
Route::post('/login',[UserController::class,'Authentification']);
Route::middleware('auth:sanctum')->get('/collaborateurs',[UserController::class,'ListCollaborateurs']);
Route::middleware('auth:sanctum')->post('/collaborateurs',[UserController::class,'CreateCollaborateur']);
Route::middleware('auth:sanctum')->put('/collaborateurs',[UserController::class,'UpdateCollaborateur']);
Route::middleware('auth:sanctum')->delete('/collaborateurs/{id}',[UserController::class,'DeleteCollaborateur']);
// CONTRATS
Route::middleware('auth:sanctum')->get('/contrats',[ContratController::class,'ListContrats']);
Route::middleware('auth:sanctum')->post('/contrats',[ContratController::class,'CreateContrat']);
Route::middleware('auth:sanctum')->put('/contrats',[ContratController::class,'UpdateContrat']);
Route::middleware('auth:sanctum')->delete('/contrats',[ContratController::class,'DeleteContrat']);
//PRODUITS
Route::middleware('auth:sanctum')->get('/produits',[ProduitController::class,'ListProduits']);
Route::middleware('auth:sanctum')->post('/produits',[ProduitController::class,'CreateProduit']);
Route::middleware('auth:sanctum')->put('/produits',[ProduitController::class,'UpdateProduit']);
Route::middleware('auth:sanctum')->delete('/produits',[ProduitController::class,'DeleteProduit']);

