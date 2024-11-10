<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialiteController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//login with google,facebook
Route::controller(SocialiteController::class)->group(function(){
    Route::get('auth/redirection/{provider}','authProviderRedirect')->name('auth.redirection');
Route::get('auth/{provider}/callback','socialAuthentication')->name('auth.callback');

});

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('notifications/{id}/mark-as-read', [DashboardController::class, 'markAsRead'])->middleware(['auth', 'verified'])->name('notifications.markAsRead');

Route::resource('countries', CountryController::class)->middleware(['auth', 'verified']);
Route::get('/countryPage', [CountryController::class, 'countryPage'])->middleware(['auth', 'verified'])->name('countryPage');

Route::resource('states', StateController::class)->middleware(['auth', 'verified']);
Route::get('/statesPage', [StateController::class, 'statePage'])->middleware(['auth', 'verified'])->name('statesPage');

Route::resource('cities', CityController::class)->middleware(['auth', 'verified']);
Route::get('/citiesPage', [CityController::class, 'cityPage'])->middleware(['auth', 'verified'])->name('citiesPage');



Route::get('/about', function () {
    return view('about'); 
})->name('about');

Route::get('/contactus', function () {
    return view('contactus'); 
})->name('contactus');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
