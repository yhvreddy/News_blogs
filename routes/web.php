<?php
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\AuthController;
Use App\Http\Controllers\DashboardController;
Use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
 *  Website Controller
 * */
Route::get('/', function () { return view('welcome'); });

/*
 *  AdminPanel Controller
 * */
Route::get('/login',[AuthController::class,'loginPage'])->name('login');
Route::post('/login/accessAccount',[AuthController::class,'loginAccessAccountPage'])->name('accessAccount');
Route::get('/register',[AuthController::class,'registerPage'])->name('register');
Route::post('/register/SaveSetupAccount',[AuthController::class,'SaveSetupAccount'])->name('register.saveSetupAccount');
Route::get('/forgetPassword',[AuthController::class,'forgetPasswordPage'])->name('forgetPassword');
Route::post('/forgetPassword/sendRequest',[AuthController::class,'requestForgetPassword'])->name('forgetPassword.sendRequest');
Route::get('/changePassword/{mail_id}/{_token}',[AuthController::class,'changePasswordPage']);
Route::post('/changePassword/updateNewPassword',[AuthController::class,'updateNewPassword'])->name('change.toNew.password');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function (){
    //Dashboard
    Route::get('/aPanel/{role}/dashboard',[DashboardController::class,'dashboardPage'])->name('dashboard');

    Route::get('/aPanel/{role?}/users',[UserController::class,'index'])->name('users.list');
    Route::get('/aPanel/{role?}/addNewUser',[UserController::class,'addNewUser'])->name('users.addNewUser');
    Route::post('/aPanel/users/saveAddUserAccount',[UserController::class,'saveAddUserAccount'])->name('saveAddUserAccount');

    Route::get('/aPanel/{role?}/categories',[CategoriesController::class,'index'])->name('categories');
    Route::post('/aPanel/categories/saveData',[CategoriesController::class,'saveCategoryData'])->name('saveCategoryData');
});
