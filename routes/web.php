<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified', 'checkuserstatus'])->get('/dashboard', function () {
    return view('dashboard');})->name('dashboard');

Route::group(['middleware' => ['auth', 'checkuserstatus']], function () {

    // system resource controllers
    Route::resource('tasks', \App\Http\Controllers\TasksController::class);
    Route::post('/users/{id}', [\App\Http\Controllers\UsersController::class, 'active'])->name('users.custom.store');
    Route::resource('users', \App\Http\Controllers\UsersController::class);
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('clients', \App\Http\Controllers\ClientController::class);
    Route::resource('matrixcategories', \App\Http\Controllers\MatrixCategoryController::class);
    Route::resource('matrixfunctions', \App\Http\Controllers\MatrixFunctionController::class);
    Route::resource('clientfunctions', \App\Http\Controllers\ClientFunction::class);
    Route::get('/estatedetails/create/{id}', [\App\Http\Controllers\EstateDetailController::class, 'create']);
    Route::post('/estatedetails/{clients}', [\App\Http\Controllers\EstateDetailController::class, 'store'])->name('estatedetails.custom.store');
    Route::resource('estatedetails', \App\Http\Controllers\EstateDetailController::class);
    Route::resource('digitalreviews', \App\Http\Controllers\DigitalReviewController::class);
    Route::get('/members/create/{id}', [\App\Http\Controllers\MembersController::class, 'create']);
    Route::post('/members/{clients}', [\App\Http\Controllers\MembersController::class, 'store'])->name('members.custom.store');
    Route::get('/members/show/{id}', [\App\Http\Controllers\MembersController::class, 'show']);
    Route::resource('members', \App\Http\Controllers\MembersController::class);
    Route::resource('TEST', \App\Http\Controllers\AnnualReviewLinkController::class);
    Route::resource('assignments', \App\Http\Controllers\AnnualReviewLinkController::class);
    Route::resource('assessments', \App\Http\Controllers\SurveyReviewController::class);

    // digital review controllers
    Route::get('/reviews/create', [\App\Http\Controllers\ReviewController::class, 'create']);
    Route::post('/reviews', [\App\Http\Controllers\ReviewController::class, 'store']);
    Route::get('/reviews/{review}', [\App\Http\Controllers\ReviewController::class, 'show']);

    //digital review question controllers
    Route::get('/reviews/{review}/questions/create', [\App\Http\Controllers\QuestionController::class, 'create']);
    Route::post('/reviews/{review}/questions', [\App\Http\Controllers\QuestionController::class, 'store']);
    Route::delete('/reviews/{review}/questions/{question}', [\App\Http\Controllers\QuestionController::class, 'destroy']);

    //Survey controllers
    Route::get('/surveys/{review}-{slug}', [\App\Http\Controllers\SurveyController::class, 'show']);
    Route::post('/surveys/{review}-{slug}', [\App\Http\Controllers\SurveyController::class, 'store']);

});


