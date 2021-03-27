<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\CreateController as CreateUserController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\ShowController as ShowUserInfoController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\Dining\Menu\ShowController as ShowMenuInfoController;
use App\Http\Controllers\Dining\Chef\ShowController as ShowChefProfileController;
use App\Http\Controllers\Booking\CreateController as CreateBookingController;
use App\Http\Controllers\Booking\ShowController as ShowBookingListController;
use App\Http\Controllers\Booking\DeleteController as DeleteBookingController;
use App\Http\Controllers\Dining\Menu\CreateController as CreateMenuController;
use App\Http\Controllers\Dining\Menu\UpdateController as UpdateMenuController;
use App\Http\Controllers\Dining\Menu\DeleteController as DeletemenuController;
use App\Http\Controllers\Dining\Chef\CreateController as CreateChefProfileController;


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

/*

Define RESTful API Endpoints

*/


Route::group(['prefix' => 'user',], function () {

    Route::post('', [CreateUserController::class, 'createUserInfo'])->name('user.create'); //register
    Route::post('login', [LoginController::class,'login'])->name('user.login'); //login
    Route::get('', [ShowUserInfoController::class,'showInfo'])->name('user.show')->middleware('auth:sanctum'); //user info query
    Route::post('logout', [LogoutController::class,'logout'])->name('user.logout')->middleware('auth:sanctum'); //logout
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'booking'], function () {
        // Route::get('', [ShowBookingListController::class,'showBookingList'])->name('booking.show'); //landing booking list for chef
        Route::get('chef', [ShowBookingListController::class,'showAllBookingList'])->name('booking.show.for.chef'); //landing booking list for chef
        Route::post('{DiningList}', [CreateBookingController::class,'createBooking'])->name('booking.create'); // create booking form
        Route::delete('{Id}', [DeleteBookingController::class,'deleteBooking'])->name('booking.delete'); //delete booking
    });
});

Route::group(['prefix' => 'dining'], function () {
    Route::group(['middleware' => 'auth:sanctum'], function (){
        Route::group(['prefix' => 'menu'], function() {
            Route::get('{DiningList}', [ShowMenuInfoController::class,'showMenuInfo'])->name('menu.show'); //landing dinig info only
            Route::post('', [CreateMenuController::class,'createmenu'])->name('menu.create'); //create menu
            Route::post('{DiningList}', [UpdateMenuController::class,'updateMenu'])->name('menu.update'); //update menu
            Route::delete('{DiningList}', [DeleteMenuController::class,'deletemenu'])->name('menu.delete'); //delete menu
        });
    });
    Route::get('menus', [ShowMenuInfoController::class,'showAllMenus'])->name('menu.showAll'); //landing all dinig info with chefProfile

    Route::group(['middleware' => 'auth:sanctum'], function (){
        Route::group(['prefix' => 'chef'], function() {
            Route::post('', [CreateChefProfileController::class,'createChefProfile'])->name('chef.create'); //create chefProfile
            Route::get('', [ShowChefProfileController::class,'showChefProfile'])->name('chef.show'); //landing chefProfile
        });
    });
});








