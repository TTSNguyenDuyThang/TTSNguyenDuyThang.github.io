<?php

use App\Http\Controllers\MyStoryController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//============API CRUD STORY==============
Route::get('Stories', [App\Http\Controllers\Api\MyStoryController::class, 'index']);
Route::post('Stories/createStory', [App\Http\Controllers\Api\MyStoryController::class, 'createStory']);

Route::get('Stories/{id}', [App\Http\Controllers\Api\MyStoryController::class, 'show']);

Route::get('Stories/{id}/edit', [App\Http\Controllers\Api\MyStoryController::class, 'edit']);
Route::put('Stories/{id}/updated',[App\Http\Controllers\Api\MyStoryController::class, 'update']);

Route::delete('Stories/{id}/delete', [App\Http\Controllers\Api\MyStoryController::class, 'destroy']);

//=====API CRUD PAGE=============
Route::get('Pages', [App\Http\Controllers\Api\PageController::class, 'index']);
Route::post('Pages/createPage', [App\Http\Controllers\Api\PageController::class, 'createpage']);

Route::get('Pages/{id}', [App\Http\Controllers\Api\PageController::class, 'show']);

Route::get('Pages/{id}/edit', [App\Http\Controllers\Api\PageController::class, 'editpage']);
Route::put('Pages/{id}/updated',[App\Http\Controllers\Api\PageController::class, 'updatepage']);

Route::delete('Pages/{id}/delete', [App\Http\Controllers\Api\PageController::class, 'delete']);


//====API CRUD AUDIO =============
Route::get('Audios', [App\Http\Controllers\Api\AudioController::class, 'index']);
Route::post('Audios/createAudios', [App\Http\Controllers\Api\AudioController::class, 'createAudio']);

Route::get('Audios/{id}', [App\Http\Controllers\Api\AudioController::class, 'show']);

Route::get('Audios/{id}/edit', [App\Http\Controllers\Api\AudioController::class, 'editAudio']);
Route::put('Audios/{id}/updated',[App\Http\Controllers\Api\AudioController::class, 'updateAudio']);

Route::delete('Audios/{id}/delete', [App\Http\Controllers\Api\AudioController::class, 'delete']);


//=======API CRUD TEXT=================

Route::get('Texts', [App\Http\Controllers\Api\TextController::class, 'index']);
Route::post('Texts/createTexts', [App\Http\Controllers\Api\TextController::class, 'createTexts']);

Route::get('Texts/{id}', [App\Http\Controllers\Api\TextController::class, 'show']);

Route::get('Texts/{id}/edit', [App\Http\Controllers\Api\TextController::class, 'editTexts']);
Route::put('Texts/{id}/updated',[App\Http\Controllers\Api\TextController::class, 'updateTexts']);

Route::delete('Texts/{id}/delete', [App\Http\Controllers\Api\TextController::class, 'delete']);


//=========API CRUD TEXTCONFIG===========
Route::get('TextConfig', [App\Http\Controllers\Api\TextController::class, 'index']);
Route::post('TextConfig/create', [App\Http\Controllers\Api\TextController::class, 'createTextConfig']);

Route::get('TextConfig/{id}', [App\Http\Controllers\Api\TextController::class, 'show']);

Route::get('TextConfig/{id}/edit', [App\Http\Controllers\Api\TextController::class, 'editTextConfig']);
Route::put('TextConfig/{id}/updated',[App\Http\Controllers\Api\TextController::class, 'updateTextConfig']);

Route::delete('TextConfig/{id}/delete', [App\Http\Controllers\Api\TextController::class, 'delete']);




