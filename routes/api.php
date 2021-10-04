<?php

use App\Http\Controllers\DetailsChansonController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\FavoriController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\ParoleOriginaleController;
use App\Http\Controllers\TraductionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'source' => SourceController::class,
    'details_chanson' => DetailsChansonController::class,
    'categorie' => CategorieController::class,
    'commentaire' => CommentaireController::class,
    'favori' => FavoriController::class,
    'Langue' => LangueController::class,
    'parole_originale' => ParoleOriginaleController::class,
    'traduction' => TraductionController::class,
]);
