<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\websiteController;
use App\Livewire\BrowseEntity;
use App\Livewire\EntityPage;
use App\Livewire\CollectionPage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::view('/terms-and-conditions', 'terms-and-conditions')->name('terms-and-conditions');
// Route::get('/terms-and-conditions/agree', 'HomeController@termsAgree')->name('terms-agree');



//Route::get('/collections', 'HomeController@collections')->name('collections');

Route::get('/', [websiteController::class, 'homepage'])->name('home');

Route::view('/about', 'about')->name('about');
Route::view('/terms-of-use', 'terms-of-use')->name('terms-of-use');
Route::view('/privacy-policy', 'privacy-policy')->name('privacy-policy');

Route::get('/browse', BrowseEntity::class)->name('browse');
Route::get('/entity/{entity}/{slug}', EntityPage::class)->name('entity');
Route::get('/collection/{collection}/{slug}', CollectionPage::class)->name('collection');

