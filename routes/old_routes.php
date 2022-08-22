<?php

use Illuminate\Support\Facades\Route;
use App\Models\CmsPage;

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
//namespace("Admin")->

// Route::prefix('vendor')->group(function(){
// 	Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('vendor.home');
// });

Route::prefix('admin')->group(function(){
	Route::group(['middleware' => 'auth:admin'], function () {
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

		Route::get('/ckc', [App\Http\Controllers\Admin\BlogController::class, 'changeStatus']);

		Route::resource('/testimonial', App\Http\Controllers\Admin\TestimonialController::class);
		Route::resource('/breed', App\Http\Controllers\Admin\BreedController::class);
		Route::resource('/allergy', App\Http\Controllers\Admin\AllergyController::class);
		Route::resource('/food-type', App\Http\Controllers\Admin\FoodTypeController::class);
		Route::resource('/meal-plans', App\Http\Controllers\Admin\MealPlansController::class);
		Route::resource('/home-content', App\Http\Controllers\Admin\HomeContentController::class);
		
		Route::get('/changePassword', [App\Http\Controllers\Admin\HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
		Route::post('/changePassword', [App\Http\Controllers\Admin\HomeController::class, 'changePasswordPost'])->name('changePasswordPost');
	});

	Route::namespace('Auth')->group(function(){
		Route::get('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login.init');
		Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
		Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
		Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');

		Route::get('forget-password', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
		Route::post('forget-password', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
		Route::get('reset-password/{token}', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
		Route::post('reset-password', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
	});
});


// Auth::routes();
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'customLogin'])->name('login'); 
Route::get('/register', [App\Http\Controllers\Auth\LoginController::class, 'showRegistrationForm'])->name('user.register');
Route::post('register', [App\Http\Controllers\Auth\LoginController::class, 'customRegistration'])->name('register'); 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('why-tnd', [App\Http\Controllers\HomeController::class, 'whyTnd']);
Route::get('our-ingredients', [App\Http\Controllers\HomeController::class, 'ourIngredients']);
Route::get('our-story', [App\Http\Controllers\HomeController::class, 'ourStory']);
Route::get('our-food', [App\Http\Controllers\HomeController::class, 'ourfood']);
Route::get('faq', [App\Http\Controllers\HomeController::class, 'faq']);
Route::get('terms-conditions', [App\Http\Controllers\HomeController::class, 'tc']);
Route::get('refund-policy', [App\Http\Controllers\HomeController::class, 'rp']);
Route::get('privacy-policy', [App\Http\Controllers\HomeController::class, 'pp']);
Route::get('shipping-details', [App\Http\Controllers\HomeController::class, 'sd']);
Route::get('/contact-us', [App\Http\Controllers\HomeController::class, 'contact'])->name('home.contact');
Route::post('/contact-us', [App\Http\Controllers\HomeController::class, 'storeAndMail'])->name('home.contact.mail');
Route::get('/build-a-box', [App\Http\Controllers\HomeController::class, 'biuldABox'])->name('home.box');
Route::post('/build-a-box', [App\Http\Controllers\HomeController::class, 'biuldABox']);
Route::post('/partial-content', [App\Http\Controllers\HomeController::class, 'partialContent'])->name('home.partial');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('main-home');

$cmses = CmsPage::all();
foreach($cmses as $cms){
	//Route::get($cms->slug, [App\Http\Controllers\CmsController::class,'index']);
}


