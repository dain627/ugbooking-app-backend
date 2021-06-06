<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\CreateController as CreateUserController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\ShowController as ShowUserInfoController;
use App\Http\Controllers\User\LogoutController;
// use \App\Http\Contollers\User\DeleteController as DeleteUserController;

use App\Http\Controllers\User\DeleteControlloer as DeleteUserController;
use App\Http\Controllers\User\UpdateController as UpdateUserController;
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

// Route::middleware(['CORS'])->group(function(){
    Route::group(['prefix' => 'user',], function () {

        Route::post('', [CreateUserController::class, 'createUserInfo'])->name('user.create'); //register 회원가입(유저타입:chef/customer)
        Route::post('login', [LoginController::class,'login'])->name('user.login'); // login  로그인(토큰발급)
        Route::get('', [ShowUserInfoController::class,'showInfo'])->name('user.show')->middleware('auth:sanctum'); // user info query  로그인 유저 정보 불러오기
        Route::get('users', [ShowUserInfoController::class,'showAllInfo'])->name('user.showAll')->middleware('auth:sanctum');
        Route::post('logout', [LogoutController::class,'logout'])->name('user.logout')->middleware('auth:sanctum'); //logout  로그아웃(토큰삭제)
        Route::delete('{Id}', [DeleteUserController::class,'deleteUser'])->name('user.delete')->middleware('auth:sanctum');
        Route::post('{Id}', [UpdateUserController::class, 'updateUser'])->name('user.update')->middleware('auth:sanctum'); //update
    });

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::group(['prefix' => 'booking'], function () {
            // Route::get('', [ShowBookingListController::class,'showBookingList'])->name('booking.show'); //landing booking list for admin 모든 북킹리스트 랜딩
            Route::get('chef', [ShowBookingListController::class,'showAllBookingList'])->name('booking.show.for.chef'); //landing booking list for chef  쉐프유저가 예약된 고객 리스트를 'My Dining'페이지에서 메뉴타이틀('dining_list' 테이블중 title)값과 해당 메뉴의 북킹리스트를 가져옴(조건:로그인as쉐프,have diningmenu and chef_profile table)
            Route::post('{DiningList}', [CreateBookingController::class,'createBooking'])->name('booking.create'); // create booking form  유저가(모든유저타입) Browse Dining 페이지의 각각의 메뉴 포스팅 아래 북킹 버튼을 통해 보낸 북킹 폼데이터 가 'bookings'테이블에 저장
            Route::delete('{Id}', [DeleteBookingController::class,'deleteBooking'])->name('booking.delete'); //delete booking 쉐프유저가 'My Dining'페이지에 있는 booking 리스트 삭제
        });
    });

    Route::group(['prefix' => 'dining'], function () {
        Route::group(['middleware' => 'auth:sanctum'], function (){
            Route::group(['prefix' => 'menu'], function() {
                Route::get('{DiningList}', [ShowMenuInfoController::class,'showMenuInfo'])->name('menu.show'); //landing dining info only 개별 쉐프유저별 등록한 메뉴와 쉐프프로필을 MY Dining 페이지에 랜딩('dining_list' 테이블중 로그인한 쉐프유저의 메뉴)와 프로필(chef_profiles 테이블중 로그인한 쉐프유저의 프로필)
                Route::post('', [CreateMenuController::class,'createmenu'])->name('menu.create'); //create menu 쉐프유저로 로그인시 'Post Dining'페이지에서 폼내용'dining_list' 테이블
                Route::post('{DiningList}', [UpdateMenuController::class,'updateMenu'])->name('menu.update'); //update menu 쉐프유저로 로그인시 'Browse Dining'페이지의 각각의 메뉴 오른쪽 상단에 펜모양의 아이콘을 눌러 내용('dining_list' 테이블) 수정
                Route::delete('{DiningList}', [DeleteMenuController::class,'deletemenu'])->name('menu.delete'); //delete menu 쉐프유저로 로그인시 'Browse Dining'페이지의 각각의 메뉴 오른쪽 상단에 펜모양의 아이콘을 눌러 내용('dining_list' 테이블) 삭제
            });
        });
        Route::get('menus', [ShowMenuInfoController::class,'showAllMenus'])->name('menu.showAll'); //landing all dining info with chefProfile  모든 쉐프유저가 등록한 메뉴('dining_list' 테이블)를 'Browse Dining'페이지에 랜딩(모든 테이블정보 랜딩)

        Route::group(['middleware' => 'auth:sanctum'], function (){
            Route::group(['prefix' => 'chef'], function() {
                Route::post('', [CreateChefProfileController::class,'createChefProfile'])->name('chef.create'); //create chefProfile 로그인한 쉐프유저가 My Dining 페이지의 상단 펜모양 아이콘을 클릭해 작성한 프로필 폼을 'chef_profiles'테이블에 저장
                Route::get('', [ShowChefProfileController::class,'showChefProfile'])->name('chef.show'); //landing chefProfile 로그인한 쉐프의 프로필정보('chef_profiles' 테이블) My Dining 페이지에 랜딩
            });
        });
    });
// });








