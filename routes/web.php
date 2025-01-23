<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//**REGISTER */
Route::get('/register',[AuthController::class,'registerform'])->name("registerform");

Route::post('/register',[AuthController::class,'register'])->name("register");
//**LOGIN */
Route::get('/login',[AuthController::class,'loginform'])->name("loginform");

Route::post('/login',[AuthController::class,'login'])->name("login");

Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/admin.dashboard',[AdminController::class,'dashboard'])->name("admin.dashboard");
    //**LOG OUT */
    Route::post('/admin.logout',[AuthController::class,'Adminlogout'])->name('admin.logout');
    //**CHANGING PASSWORD AND DETAILS */
    Route::get('/admin.passwordchanged',[AdminController::class,'adminpasswordchange'])->name("admin.password");

    Route::post('/admin.passwordchange',[AuthController::class,'adminchangepassword'])->name("admin.changepassword");

    Route::get('/admin.detailschange',[AdminController::class,'admindetailschange'])->name("admin.details");

    Route::post('/admin.detailschange',[AuthController::class,'adminchangedetails'])->name("admin.changedetails");
    
    //**BLOG */
    Route::match(['post','get'],'/admin.blog',[BlogController::class,'AdminBlog'])->name("admin.blog");

    Route::get('/admin.blog/{blog}/edit',[BlogController::class,'editblog'])->name("admin.editblog");

    Route::put('/admin.blog/{blog}/update',[BlogController::class,'updateblog'])->name("admin.updateblog");

    Route::delete('/admin.blog/{blog}/delete',[BlogController::class,'deleteblog'])->name("admin.deleteblog");

    Route::get('/admin.showblog',[AdminController::class,'adminshowblog'])->name("admin.showblog");

    Route::get('/admin.commentmanage',[AdminController::class,'admincommentmanage'])->name("admin.manage");

    Route::delete('/admin.commentdelete/{comment}',[AdminController::class,'admindeletecomment'])->name("admin.deletecomment");
    
});
Route::middleware('auth')->group(function(){
    
    Route::get('/user.home',[UserController::class,'home'])->name("user.home");
    //**LOG OUT */
    Route::post('/user.logout',[AuthController::class,'Userlogout'])->name("user.logout");
    //**CHANGING PASSWORD AND DETAILS */
    Route::get('/user.passwordchanged',[UserController::class,'userpasswordchange'])->name("user.password");

    Route::post('/user.passwordchange',[AuthController::class,'userchangepassword'])->name("user.changepassword");

    Route::get('/user.detailschange',[UserController::class,'userdetailschange'])->name("user.details");

    Route::post('/user.detailschange',[AuthController::class,'userchangedetails'])->name("user.changedetails");
    
    Route::get('/user.showblog',[UserController::class,'blogshow'])->name("user.blogshow");
    
    Route::post('/user.comment/{id}',[CommentController::class,'usercomment'])->name("user.comment");

    Route::delete('/user.com/{comment}',[CommentController::class,'usercommentdelete'])->name("user.com");

    Route::get('/user.comedit/{comment}',[CommentController::class,'usercommentedit'])->name("user.comedit");

    Route::put('/user.comupdate/{comment}',[CommentController::class,'usercommentupdate'])->name("user.comupdate");
});