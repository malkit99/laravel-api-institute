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
        Route::apiResource('/batch' , 'Api\Course\BatchController');
        Route::apiResource('/content' , 'Api\Course\ContentController');
        Route::apiResource('/course-code' ,'Api\Course\CourseCodeController');
        Route::apiResource('/course-fee' ,'Api\Course\CourseFeeController');
        Route::apiResource('/duration' , 'Api\Course\DurationController');
        Route::apiResource('/course' , 'Api\Course\CourseController');
        Route::get('/course/{course:slug}' , 'Api\Course\CourseController@showBySlug');
        Route::get('/course/{course}' , 'Api\Course\CourseController@showById');
        Route::post('/course/{course}' , 'Api\Course\CourseController@updateById');
        Route::apiResource('/subject' , 'Api\Course\SubjectController');
        Route::apiResource('/team' , 'Api\Team\TeamController');
        Route::post('/team/{team}' , 'Api\Team\TeamController@updateById');
        Route::apiResource('/event' , 'Api\Event\EventController');
        Route::post('/event/{event}' , 'Api\Event\EventController@updateById');
        Route::post('/event/status/{event}' , 'Api\Event\EventController@status');
        Route::apiResource('/testimonial' , 'Api\Testimonial\TestimonialController');
        Route::post('/testimonial/status/{testimonial}' , 'Api\Testimonial\TestimonialController@status');
        Route::post('/testimonial/update/{testimonial}' , 'Api\Testimonial\TestimonialController@updateById');

});


Route::post('/forgot-password' , 'Api\Auth\ForgotPasswordController@sendResetLinkEmail')->name('api.forgot.password');
Route::post('/reset-password' , 'Api\Auth\ResetPasswordController@reset')->name('api.password.reset');
Route::apiResource('/login','Api\Auth\LoginController');
Route::post('/airlock/token' , 'GenarateToken@token');

