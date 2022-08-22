<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
  
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  
Auth::routes();
Route::post('register', [App\Http\Controllers\Auth\LoginController::class, 'customRegistration'])->name('register'); 
  
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
	Route::prefix('admin')->group(function(){
    	Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
		Route::resource('/cms-pages', App\Http\Controllers\Admin\CmsPageController::class);
		Route::resource('/blog', App\Http\Controllers\Admin\BlogController::class);
		Route::resource('/etemplate', App\Http\Controllers\Admin\EmailTemplatesController::class);
		Route::resource('/roles', App\Http\Controllers\Admin\RolesController::class);
		Route::resource('/category', App\Http\Controllers\Admin\CategoryController::class);
		Route::resource('/permission', App\Http\Controllers\Admin\PermissionController::class);
		Route::resource('/setting', App\Http\Controllers\Admin\SettingController::class);
		Route::resource('/users', App\Http\Controllers\Admin\UsersController::class);
		Route::resource('/product-types', App\Http\Controllers\Admin\ProductTypesController::class);
		Route::resource('/warehouse', App\Http\Controllers\Admin\WarehouseController::class);
		Route::resource('/testimonial', App\Http\Controllers\Admin\TestimonialController::class);
		Route::resource('/home-content', App\Http\Controllers\Admin\HomeContentController::class);
		Route::resource('/breed', App\Http\Controllers\Admin\BreedController::class);
		Route::resource('/allergy', App\Http\Controllers\Admin\AllergyController::class);
		Route::resource('/food-type', App\Http\Controllers\Admin\FoodTypeController::class);
		Route::resource('/meal-plans', App\Http\Controllers\Admin\MealPlansController::class);
	});
});
  
Route::middleware(['auth', 'user-access:manager'])->group(function () {
	Route::prefix('manager')->group(function(){
		Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('manager.home');
		Route::get('/profile', [App\Http\Controllers\Admin\HomeController::class, 'profile'])->name('manager.edit.profile');
		Route::post('/profile', [App\Http\Controllers\Admin\HomeController::class, 'updateProfile'])->name('manager.update.profile');
		Route::resource('/warehouse', App\Http\Controllers\Admin\WarehouseController::class);
	});
});