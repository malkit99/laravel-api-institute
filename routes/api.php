<?php

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

// Route::middleware('auth:airlock')->get('/user', function(Request $request){

//         return response()->json(['data' => $request->user()]);
// });

Route::group(['middleware' => 'auth:airlock'] , function(){

        Route::get('/user','Api\User\UserController@user');
        Route::apiResource('/permissions','Api\Role\PermissionController');
        Route::apiResource('/roles','Api\Role\RoleController');
        Route::get('/allroles','Api\Role\AllRolesController@index');
        Route::get('/roles/permission/{role}','Api\Role\RoleController@permissionById')->name('permission.by.id');
        Route::apiResource('/register','Api\Auth\RegisterController');
        Route::post('/upload/{upload}/image-update','Api\User\UploadController@uploadImage');
        Route::apiResource('/category' , 'Api\Category\CourseCategoryController');
        Route::get('/category/category/{courseCategory}' , 'Api\Category\CourseCategoryController@categoryById');
});


Route::post('/forgot-password' , 'Api\Auth\ForgotPasswordController@sendResetLinkEmail')->name('api.forgot.password');
Route::post('/reset-password' , 'Api\Auth\ResetPasswordController@reset')->name('api.password.reset');
Route::apiResource('/login','Api\Auth\LoginController');
Route::post('/airlock/token' , 'GenarateToken@token');

