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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/dfdf/aaa', function () {
//     return response()->json([
//         'asdf' => true,
//     ]);
// });

// Route::group(['prefix' => 'user'], function () {
//     Route::post('', [CreateUserController::class, 'createUserInfo'])->name('user.create'); //register

// });

// Route::post('user/', [CreateUserController::class, 'createUserInfo'])->name('user.create'); //register

// Route::get('user/', [ShowUserInfoController::class,'showInfo'])->name('user.show'); //user info query

// Route::post('user/login/', [LoginController::class,'login'])->name('user.login'); //login

// Route::post('user/logout/', [LogoutController::class,'logout'])->name('user.logout'); //logout

// Route::post('booking/', [CreateBookingController::class,'createBooking'])->name('booking.create'); // create booking form

// Route::get('booking/', [ShowBookingListController::class,'showBookingList'])->name('booking.show'); //landing booking list

// Route::delete('booking/', [DeleteBookingController::class,'deleteBooking'])->name('booking.delete'); //delete booking

// Route::get('dining/menu', [ShowMenuInfoController::class,'showMenuInfo'])->name('menu.show'); //landing dinig info

// Route::post('dining/menu', [CreateMenuController::class,'createmenu'])->name('menu.create'); //create menu

// Route::post('dining/menu', [UpdateMenuController::class,'updateMenu'])->name('menu.update'); //update menu

// Route::delete('dining/menu', [DeleteMenuController::class,'deletemenu'])->name('menu.delete'); //delete menu

// Route::post('dining/chef', [CreateChefProfileController::class,'createChefProfile'])->name('chef.create'); //create chefProfile

// Route::get('dining/chef', [ShowChefProfileController::class,'showChefProfile'])->name('chef.show'); //landing chefProfile

# grouping prefix and middleware
// Route::group(['middleware' => 'auth:sanctum'], function () {
//     # code...
//     Route::group(['prefix' => 'dining'], function () {

//         Route::group(['prefix' => 'menu'], function() {
//             Route::get('', [ShowMenuInfoController::class,'showMenuInfo'])->name('menu.show');
//         });
//     });

// });

/*

Define RESTful API Endpoints
*/


Route::group(['prefix' => 'user',], function () {

    Route::post('', [CreateUserController::class, 'createUserInfo'])->name('user.create'); //register v
    Route::post('login', [LoginController::class,'login'])->name('user.login'); //login v
    Route::get('', [ShowUserInfoController::class,'showInfo'])->name('user.show')->middleware('auth:sanctum'); //user info query v
    Route::post('logout', [LogoutController::class,'logout'])->name('user.logout')->middleware('auth:sanctum'); //logout v
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'booking'], function () {
        // Route::get('', [ShowBookingListController::class,'showBookingList'])->name('booking.show'); //landing booking list for chef v
        Route::get('chef', [ShowBookingListController::class,'showAllBookingList'])->name('booking.show.for.chef'); //landing booking list for chef v
        Route::post('{DiningList}', [CreateBookingController::class,'createBooking'])->name('booking.create'); // create booking form v
        Route::delete('{Id}', [DeleteBookingController::class,'deleteBooking'])->name('booking.delete'); //delete booking
    });
});

Route::group(['prefix' => 'dining'], function () {
    Route::group(['middleware' => 'auth:sanctum'], function (){
        Route::group(['prefix' => 'menu'], function() {
            Route::get('{DiningList}', [ShowMenuInfoController::class,'showMenuInfo'])->name('menu.show'); //landing dinig info only v
            Route::post('', [CreateMenuController::class,'createmenu'])->name('menu.create'); //create menu v
            Route::post('{DiningList}', [UpdateMenuController::class,'updateMenu'])->name('menu.update'); //update menu v
            Route::delete('{DiningList}', [DeleteMenuController::class,'deletemenu'])->name('menu.delete'); //delete menu v
        });
    });
    Route::get('menus', [ShowMenuInfoController::class,'showAllMenus'])->name('menu.showAll'); //landing all dinig info with chefProfile v

    Route::group(['middleware' => 'auth:sanctum'], function (){
        Route::group(['prefix' => 'chef'], function() {
            Route::post('', [CreateChefProfileController::class,'createChefProfile'])->name('chef.create'); //create chefProfile v
            Route::get('', [ShowChefProfileController::class,'showChefProfile'])->name('chef.show'); //landing chefProfile v
        });
    });
});








