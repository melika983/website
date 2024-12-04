<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RewardController;


Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('main');
// });
Route::get('/', function () {
    return view('main');
});


Route::get('/page3', function () {
    return view('page3');
});

Route::get('/companies', [AuthController::class, 'companies'])->name('companies');
Route::get('/user_rewards', [AuthController::class, 'userRewards']);

Route::get('/guide', function () {
    return view('guide');
});
Route::get('/scan', function () {
    return view('scan');
});
Route::prefix('admin')->middleware('\App\Http\Middleware\IsAdmin')->group(function () {
    Route::get('admin-home', [AuthController::class, 'adminHome'])->name('admin.home');
    Route::match(['get', 'post'], '/', [UserController::class, 'dashboard']);
    Route::match(['get', 'post'], '/Users', [UserController::class, 'Users'])->name('Users');
    Route::get('/Users/{id}', [\App\Http\Controllers\UserController::class, 'info']);
    Route::post( '/Users', [\App\Http\Controllers\UserController::class, 'store'])->name('UsersStore');
    Route::post( '/Users/delete', [\App\Http\Controllers\UserController::class, 'delete']);
    Route::get('/Company', [\App\Http\Controllers\CompanyController::class, 'Company'])->name('Company');
    Route::get('/company/{id}', [\App\Http\Controllers\CompanyController::class, 'info']);
    Route::post( '/Company', [\App\Http\Controllers\CompanyController::class, 'store'])->name('CompanyStore');
    Route::post( '/Company/delete', [\App\Http\Controllers\CompanyController::class, 'delete']);
    Route::get('/reward/{id}', [\App\Http\Controllers\RewardController::class, 'info']);
    Route::post('/reward/store', [\App\Http\Controllers\RewardController::class, 'store']);
    Route::post('/reward_detail/store', [\App\Http\Controllers\RewardController::class, 'importExcel']);
    Route::post('/reward_detail/delete', [\App\Http\Controllers\RewardController::class, 'deleteDetail']);
    Route::post( '/reward/delete', [\App\Http\Controllers\RewardController::class, 'delete']);
    Route::get('/reward/details/{id}', [\App\Http\Controllers\RewardController::class, 'details']);
    Route::get('/reward/report/{id}', [\App\Http\Controllers\RewardController::class, 'reportExcel']);
    Route::get('/users/report_excel', [\App\Http\Controllers\UserController::class, 'reportExcel']);

    Route::match(['get', 'post'], '/Reward', [RewardController::class, 'Reward'])->name('Reward');
    Route::match(['get', 'post'], '/Exit', [UserController::class, 'Exit'])->name('Exit');
});
//Route::get('/rewardx/report1', [\App\Http\Controllers\RewardController::class, 'report1']);

Route::match(['get', 'post'], '/scan', [UserController::class, 'scan'])->name('scan');

Route::match(['get', 'post'], '/main', [UserController::class, 'main'])->name('main');

Route::match(['get', 'post'], '/username', [UserController::class, 'username'])->name('username');

Route::match(['get', 'post'], '/guide', [UserController::class, 'guide'])->name('guide');

Route::match(['get'], '/admin-login', [AuthController::class, 'adminLoginShow']);
Route::post( 'admin-login', [AuthController::class, 'adminLogin'])->name('login-admin');

Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('login');

Route::match(['get', 'post'], '/verify', [AuthController::class, 'verify'])->name('verify');

Route::match(['get', 'post'], '/help', [AuthController::class, 'help'])->name('help');

Route::match(['get', 'post'], '/page3', [AuthController::class, 'page3'])->name('page3');

Route::match(['get', 'post'], '/page4', [AuthController::class, 'page4'])->name('page4');

Route::match(['get', 'post'], '/about_us', [AuthController::class, 'about_us'])->name('about_us');


Route::get( 'company/{uuid}', [RewardController::class, 'company']);
Route::post( 'random-reward', [RewardController::class, 'randomReward']);


Route::put('update/{id}', [UserController::class, 'update'])->name('update');
Route::put('Delete/{id}', [UserController::class, 'Delete'])->name('Delete');

Route::put('updateCompany/{id}', [UserController::class, 'updateCompany'])->name('updateCompany');
Route::put('DeleteCompany/{id}', [UserController::class, 'DeleteCompany'])->name('DeleteCompany');


Route::put('updateReward/{id}', [UserController::class, 'updateReward'])->name('updateReward');
Route::put('DeleteReward/{id}', [UserController::class, 'DeleteReward'])->name('DeleteReward');

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/createRandomDt/{rewardId}', [RewardController::class, 'createRandomDt'])->name('createRandomDt');


// Route::get('/Users', function () {
//     return view('Users');
// });


// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });
