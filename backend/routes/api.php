<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\TempImageController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\ServiceController as FrontServiceController;
use App\Http\Controllers\front\ProjectController as FrontProjectController;
use App\Http\Controllers\front\TestimonialController as FrontTestimonialController;
use App\Http\Controllers\front\MemberController as FrontMemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('authenticate', [AuthenticationController::class,'authenticate']);
Route::get('get-services', [FrontServiceController::class,'index']);
Route::get('get-latest-services', [FrontServiceController::class,'latestServices']);
Route::get('get-service/{id}', [FrontServiceController::class,'service']);
Route::post('contact-now', [ContactController::class,'index']);

Route::get('get-projects', [FrontProjectController::class,'index']);
Route::get('get-latest-projects', [FrontProjectController::class,'latestprojects']);
Route::get('get-project/{id}', [FrontProjectController::class,'project']);

Route::get('get-testimonials', [FrontTestimonialController::class,'index']);

Route::get('get-members', [FrontMemberController::class,'index']);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::group(['middleware' => ['auth:sanctum']],function(){
        //protected routes
        Route::get('dashboard', [DashboardController::class,'index']);
        Route::get('logout', [AuthenticationController::class,'logout']);

        //service routes
        Route::post('services', [ServiceController::class,'store']);
        Route::get('services', [ServiceController::class,'index']);
        Route::put('services/{id}', [ServiceController::class,'update']);
        Route::get('services/{id}', [ServiceController::class,'show']);
        Route::delete('services/{id}', [ServiceController::class,'destroy']);

        //project routes
        Route::post('projects', [ProjectController::class,'store']);
        Route::get('projects', [ProjectController::class,'index']);
        Route::put('projects/{id}', [ProjectController::class,'update']);
        Route::get('projects/{id}', [ProjectController::class,'show']);
        Route::delete('projects/{id}', [ProjectController::class,'destroy']);

        //tetimonial routes
        Route::post('testimonials', [TestimonialController::class,'store']);
        Route::get('testimonials', [TestimonialController::class,'index']);
        Route::get('testimonials/{id}', [TestimonialController::class,'show']);
        Route::put('testimonials/{id}', [TestimonialController::class,'update']);
        Route::delete('testimonials/{id}', [TestimonialController::class,'destroy']);

        //member routes
        Route::post('members', [MemberController::class,'store']);
        Route::get('members', [MemberController::class,'index']);
        Route::get('members/{id}', [MemberController::class,'show']);
        Route::put('members/{id}', [MemberController::class,'update']);
        Route::delete('members/{id}', [MemberController::class,'destroy']);

        //Temp Image route
        Route::post('temp-images', [TempImageController::class,'store']);
});
