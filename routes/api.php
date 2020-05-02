<?php


use Illuminate\Support\Facades\Route;





Route::group(['middleware' => 'auth:sanctum'] , function(){
        Route::get('/user','Api\User\UserController@user');
        Route::apiResource('/permissions','Api\Role\PermissionController');
        Route::apiResource('/roles','Api\Role\RoleController');
        Route::get('/allroles','Api\Role\AllRolesController@index');
        Route::get('/roles/permission/{role}','Api\Role\RoleController@permissionById')->name('permission.by.id');
        Route::apiResource('/register','Api\Auth\RegisterController');
        Route::post('/register/update/{register}','Api\Auth\RegisterController@updateById');
        Route::post('/upload/{upload}/image-update','Api\User\UploadController@uploadImage');
        Route::apiResource('/category' , 'Api\Category\CourseCategoryController');
        Route::get('/category/category/{courseCategory}' , 'Api\Category\CourseCategoryController@categoryById');
        Route::apiResource('/batch' , 'Api\Course\BatchController');
        Route::apiResource('/content' , 'Api\Course\ContentController');
        Route::apiResource('/course-code' ,'Api\Course\CourseCodeController');
        Route::apiResource('/course-fee' ,'Api\Course\CourseFeeController');
        Route::apiResource('/duration' , 'Api\Course\DurationController');
        Route::apiResource('/course' , 'Api\Course\CourseController');
        Route::post('/course/status/{course}' , 'Api\Course\CourseController@status');
        Route::post('/course/popular/{course}' , 'Api\Course\CourseController@popular');
        Route::get('/course/course-slug/{course:slug}' , 'Api\Course\CourseController@showBySlug');
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
        Route::apiResource('/authorization' , 'Api\Authorization\AuthorizationController');
        Route::post('/authorization/update/{authorization}' , 'Api\Authorization\AuthorizationController@updateById');
        Route::post('/authorization/status/{authorization}' , 'Api\Authorization\AuthorizationController@status');
        Route::apiResource('/jobOpportunity' , 'Api\JobOpportunity\JobOpportunityController');
        Route::post('/jobOpportunity/update/{jobOpportunity}' , 'Api\JobOpportunity\JobOpportunityController@updateById');
        Route::post('/jobOpportunity/status/{jobOpportunity}' , 'Api\JobOpportunity\JobOpportunityController@status');
        Route::apiResource('/contact' , 'Api\Contact\ContactController');
        Route::apiResource('/callBack' , 'Api\CallBack\CallBackController');
        Route::apiResource('/service' , 'Api\Service\ServiceController');
});


Route::post('/forgot-password' , 'Api\Auth\ForgotPasswordController@sendResetLinkEmail')->name('api.forgot.password');
Route::post('/reset-password' , 'Api\Auth\ResetPasswordController@reset')->name('api.password.reset');
Route::apiResource('/login','Api\Auth\LoginController');
Route::post('/sanctum/token' , 'GenarateToken@token');
Route::post('/contact-us' , 'Api\Front\Contact\ContactUsController@store');
