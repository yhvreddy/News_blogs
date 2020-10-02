<?php
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\AuthController;
Use App\Http\Controllers\DashboardController;
Use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ArticalsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolesController;

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
    Route::group(['prefix'=>'aPanel'],function (){
        //Dashboard
        Route::get('{role}/dashboard',[DashboardController::class,'dashboardPage'])->name('dashboard');
        //Users
        Route::get('{role?}/users',[UserController::class,'index'])->name('users.list');
        Route::get('{role?}/addNewUser',[UserController::class,'addNewUser'])->name('users.addNewUser');
        Route::post('users/saveAddUserAccount',[UserController::class,'saveAddUserAccount'])->name('saveAddUserAccount');
        //Categories
        Route::get('{role?}/categories',[CategoriesController::class,'index'])->name('categories');
        Route::post('categories/saveData',[CategoriesController::class,'saveCategoryData'])->name('saveCategoryData');
        //SubCategories
        Route::get('{role?}/subcategories',[SubCategoriesController::class,'index'])->name('subcategories');
        Route::post('subcategories/saveData',[SubCategoriesController::class,'saveSubCategoryData'])->name('saveSubCategoryData');
        //Tags
        Route::get('{role?}/tags',[TagsController::class, 'index'])->name('tags');
        Route::post('tags/saveData',[TagsController::class, 'saveTagData'])->name('newTag.save');
        //Posts
        Route::get('{role?}/posts',[ArticalsController::class,'index'])->name('posts.list');
        Route::get('{role?}/posts/addNew',[ArticalsController::class,'addNewPost'])->name('posts.add');
        Route::get('/posts/addNew/appendSource/{id?}',[ArticalsController::class,'appendNewPostSource'])->name('posts.add.appendSource');
        Route::post('posts/saveData',[ArticalsController::class,'savePostData'])->name('savePostData');


        Route::get('getSubCategories/list/{category_id}',[CategoriesController::class,'getSubCategoriesList']);


        Route::get('{role?}/userProfile',[ProfileController::class,'userProfile'])->name('userProfile');

        Route::get('{role?}/roles',[RolesController::class,'roles'])->name('roles');
    });
});
