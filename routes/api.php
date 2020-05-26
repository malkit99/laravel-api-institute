<?php

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = $request->user() ;
    return response(['data' => new UserResource($user)]);
});

Route::middleware('auth:admin')->get('/admin/user', function (Request $request) {
    $user = Auth::user();
    return response(['data' => new UserResource($user)]);
});

Route::middleware('auth:student')->get('/student/user', function (Request $request) {
    $user = Auth::user();
    return response(['data' => new UserResource($user)]);
});


Route::group(['middleware' => 'auth:sanctum'] , function(){
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
        Route::get('/course/all-course-name/course' , 'Api\Course\CourseController@courseName');
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
        Route::post('/service/update/{service}' , 'Api\Service\ServiceController@updateById');
        Route::post('/service/status/{service}' , 'Api\Service\ServiceController@status');
        Route::apiResource('/website' , 'Api\Website\WebsiteController');
        Route::post('/website/status/{website}' , 'Api\Website\WebsiteController@status');
        Route::apiResource('/discount' , 'Api\Discount\DiscountController');
        Route::post('/discount/update/{discount}' , 'Api\Discount\DiscountController@updateById');
        Route::post('/discount/status/{discount}' , 'Api\Discount\DiscountController@status');
        Route::apiResource('/slider' , 'Api\Slider\SliderController');
        Route::post('/slider/update/{slider}' , 'Api\Slider\SliderController@updateById');
        Route::post('/slider/status/{slider}' , 'Api\Slider\SliderController@status');
        Route::apiResource('/country' , 'Api\Country\CountryController');
        Route::apiResource('/state' , 'Api\Country\StateController');
        Route::apiResource('/city' , 'Api\Country\CityController');
        Route::apiResource('/facility' , 'Api\Facility\FacilityController');
        Route::post('/facility/status/{facility}' , 'Api\Facility\FacilityController@status');
        Route::post('/facility/update/{facility}' , 'Api\Facility\FacilityController@updateById');
        Route::get('/city/city/{id}' , 'Api\Country\CityController@getCityById');
        Route::get('/state/state/{id}' , 'Api\Country\StateController@getStateById');
        Route::post('/import-excel' , 'Api\Country\ImportCountryController@importCountry');
        Route::post('/state-excel' , 'Api\Country\ImportStateController@importState');
        Route::post('/city-excel' , 'Api\Country\ImportCityController@importCity');
    });


    Route::post('/forgot-password' , 'Api\Auth\ForgotPasswordController@sendResetLinkEmail')->name('api.forgot.password');
    Route::post('/reset-password' , 'Api\Auth\ResetPasswordController@reset')->name('api.password.reset');
    Route::post('/login','Api\Auth\LoginController@login');
    Route::post('/logout','Api\Auth\LoginController@logout');
    Route::post('/sanctum/token' , 'GenarateToken@token');
    Route::post('/contact-us' , 'Api\Front\Contact\ContactUsController@contactUs');
    Route::post('/call-back' , 'Api\Front\Contact\ContactUsController@callBack');
    Route::post('/register-discount' , 'Api\Front\Contact\RegisterDiscountController@store');
    Route::apiResource('/website-detail' , 'Api\Front\Website\WebsiteDetailController')->only(['index']);
    Route::apiResource('/slider-image' , 'Api\Front\Slider\SliderImageController')->only(['index']);
    Route::apiResource('/our-service' , 'Api\Front\Service\OurServiceController')->only(['index']);
    Route::apiResource('/our-testimonial' , 'Api\Front\OurTestimonialController')->only(['index']);
    Route::apiResource('/our-course' , 'Api\Front\OurCourseController')->only(['index']);
    Route::apiResource('/our-event' , 'Api\Front\OurEventController')->only(['index']);
    Route::apiResource('/our-authorization' , 'Api\Front\OurAuthorizationController')->only(['index']);
    Route::apiResource('/our-team' , 'Api\Front\OurTeamController')->only(['index']);
    Route::apiResource('/our-category' , 'Api\Front\OurCategoryController')->only(['index']);
    Route::apiResource('/our-facility' , 'Api\Front\OurFacilityController')->only(['index']);
    Route::apiResource('/our-discount' , 'Api\Front\OurDiscountController')->only(['index']);
    Route::get('/course-name' , 'Api\Front\CourseNameController@courseName');
    Route::get('/course-discount' , 'Api\Front\CourseNameController@courseDiscountName');
    Route::get('/category/course-slug/{category:slug}' , 'Api\Front\CourseByCategorySlugController@courseBySlug');
    Route::get('/course/slug/{course:slug}' , 'Api\Front\CourseByCourseSlugController@courseByCourseSlug');
    Route::get('/subject/slug/{subject:slug}' , 'Api\Front\CourseContentBySlugController@courseContentBySlug');
    Route::get('/our-job' , 'Api\Front\OurJobController@jobOpportunity');


    Route::post('/admin/login','Api\Auth\AdminLoginController@login');
    Route::post('/admin/logout','Api\Auth\AdminLoginController@logout');


    Route::post('/student/login','Api\Auth\StudentLoginController@login');
    Route::post('/student/logout','Api\Auth\StudentLoginController@logout');


