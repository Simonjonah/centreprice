<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LgaController;
use App\Http\Controllers\NgstateController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\SubcategoryController;
use App\Models\Admin;

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


Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
// The callback url after a payment
Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/addbooks1/{ref_no}', [CourseController::class, 'addbooks1'])->name('addbooks1');

Route::prefix('admin')->name('admin.')->group(function() {

    Route::middleware(['guest:admin'])->group(function() {
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::view('/register','dashboard.admin.register')->name('register');
        Route::post('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/check', [AdminController::class, 'check'])->name('check');

    });
    
    Route::middleware(['auth:admin'])->group(function() {
        
        Route::get('/addlga', [LgaController::class, 'addlga'])->name('addlga');
        Route::post('/createmilestone', [MilestoneController::class, 'createmilestone'])->name('createmilestone');
        Route::get('/viewmilestones', [MilestoneController::class, 'viewmilestones'])->name('viewmilestones');
        Route::get('/editmilstone/{id}', [MilestoneController::class, 'editmilstone'])->name('editmilstone');
        Route::put('/updatemilstone/{id}', [MilestoneController::class, 'updatemilstone'])->name('updatemilstone');
        Route::get('/deletemilestone/{id}', [MilestoneController::class, 'deletemilestone'])->name('deletemilestone');
       
        Route::put('/updatecategory/{id}', [CategoryController::class, 'updatecategory'])->name('updatecategory');
        Route::get('/editcategory/{id}', [CategoryController::class, 'editcategory'])->name('editcategory');
        Route::get('/viewcategory', [CategoryController::class, 'viewcategory'])->name('viewcategory');
        Route::get('/addcategory', [CategoryController::class, 'addcategory'])->name('addcategory');
        Route::post('/createcategory', [CategoryController::class, 'createcategory'])->name('createcategory');
        Route::get('/addsubcategory', [SubcategoryController::class, 'addsubcategory'])->name('addsubcategory');
        Route::post('/createsubcategory', [SubcategoryController::class, 'createsubcategory'])->name('createsubcategory');
        Route::get('/viewsubcategory', [SubcategoryController::class, 'viewsubcategory'])->name('viewsubcategory');
        Route::get('/editsubcategory/{slug}', [SubcategoryController::class, 'editsubcategory'])->name('editsubcategory');
        Route::put('/updatesubcategory/{slug}', [SubcategoryController::class, 'updatesubcategory'])->name('updatesubcategory');
        
        Route::get('/addproducts', [ProductController::class, 'addproducts'])->name('addproducts');
        Route::get('/firstphoto/{ref_no}', [ProductController::class, 'firstphoto'])->name('firstphoto');
        Route::post('/createproduct', [ProductController::class, 'createproduct'])->name('createproduct');
        Route::put('/add2ndphoto/{ref_no}', [ProductController::class, 'add2ndphoto'])->name('add2ndphoto');
        Route::get('/thirdphoto/{ref_no}', [ProductController::class, 'thirdphoto'])->name('thirdphoto');
        Route::put('/add3photo/{ref_no}', [ProductController::class, 'add3photo'])->name('add3photo');
        
        Route::get('/fourthphoto/{ref_no}', [ProductController::class, 'fourthphoto'])->name('fourthphoto');
        Route::put('/add4photo/{ref_no}', [ProductController::class, 'add4photo'])->name('add4photo');
        Route::get('/fifthphoto/{ref_no}', [ProductController::class, 'fifthphoto'])->name('fifthphoto');
        Route::put('/add5photo/{ref_no}', [ProductController::class, 'add5photo'])->name('add5photo');
        Route::get('/approveproduct/{slug}', [ProductController::class, 'approveproduct'])->name('approveproduct');
        Route::get('/suspendproduct/{slug}', [ProductController::class, 'suspendproduct'])->name('suspendproduct');
        Route::get('/editproduct/{slug}', [ProductController::class, 'editproduct'])->name('editproduct');
        Route::get('/viewproducts', [ProductController::class, 'viewproducts'])->name('viewproducts');
        
        Route::post('/createroot', [RootController::class, 'createroot'])->name('createroot');
        Route::get('/addroots', [RootController::class, 'addroots'])->name('addroots');
        Route::get('/viewroots', [RootController::class, 'viewroots'])->name('viewroots');
        Route::get('/editroot/{slug}', [RootController::class, 'editroot'])->name('editroot');
        Route::put('/updatreroot/{slug}', [RootController::class, 'updatreroot'])->name('updatreroot');
        Route::get('/deleteroots/{slug}', [RootController::class, 'deleteroots'])->name('deleteroots');
        
        
        
        // Route::get('/viewusers', [UserController::class, 'viewusers'])->name('viewusers');
        // Route::get('/contactdelete/{id}', [ContactmeController::class, 'contactdelete'])->name('contactdelete');
        Route::view('/home','dashboard.admin.home')->name('home');
        
        Route::get('/addmilestone', [MilestoneController::class, 'addmilestone'])->name('addmilestone');
        Route::get('/home', [AdminController::class, 'home'])->name('home');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::get('/addstate', [NgstateController::class, 'addstate'])->name('addstate');
        Route::get('/addsenatarial', [DistrictController::class, 'addsenatarial'])->name('addsenatarial');
        Route::post('/createstate', [NgstateController::class, 'createstate'])->name('createstate');
        Route::get('/viewstates', [NgstateController::class, 'viewstates'])->name('viewstates');
        Route::get('/editstate/{id}', [NgstateController::class, 'editstate'])->name('editstate');
        Route::get('/deletestate/{id}', [NgstateController::class, 'deletestate'])->name('deletestate');
        Route::put('/updateestate/{id}', [NgstateController::class, 'updateestate'])->name('updateestate');
        
        Route::post('/createdistricts', [DistrictController::class, 'createdistricts'])->name('createdistricts');
        Route::get('/viewsenatarials', [DistrictController::class, 'viewsenatarials'])->name('viewsenatarials');
        Route::get('/editdistricts/{id}', [DistrictController::class, 'editdistricts'])->name('editdistricts');
        Route::put('/updateedistricts/{id}', [DistrictController::class, 'updateedistricts'])->name('updateedistricts');
        Route::get('/deletedistricts/{id}', [DistrictController::class, 'deletedistricts'])->name('deletedistricts');
        
        Route::post('/createlga', [LgaController::class, 'createlga'])->name('createlga');
        Route::get('/viewlga', [LgaController::class, 'viewlga'])->name('viewlga');
        Route::get('/editlga/{id}', [LgaController::class, 'editlga'])->name('editlga');
        Route::get('/deletelga/{id}', [LgaController::class, 'deletelga'])->name('deletelga');
        Route::put('/updatetelga/{id}', [LgaController::class, 'updatetelga'])->name('updatetelga');
        
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout'); 
        
       
    });
});





// Route::get('/registervendor', [UserController::class, 'registervendor'])->name('registervendor');
// routes/web.php

Route::get('/registervendor/{lga}/{state}/ref={referral}', [UserController::class, 'registervendor'])->name('registervendor');

Route::prefix('web')->name('web.')->group(function() {

    Route::middleware(['guest:web'])->group(function() {
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');


    });
    
    Route::middleware(['auth:web'])->group(function() {
       
        
        // Route::post('/createtestimony', [TestimonyController::class, 'createtestimony'])->name('createtestimony');
        // Route::get('/addtestimony', [TestimonyController::class, 'addtestimony'])->name('addtestimony');
        // Route::get('/viewtestimony', [TestimonyController::class, 'viewtestimony'])->name('viewtestimony');
        // Route::get('/testimonyview/{id}', [TestimonyController::class, 'testimonyview'])->name('testimonyview');
        // Route::get('/testimonyedit/{id}', [TestimonyController::class, 'testimonyedit'])->name('testimonyedit');
        // Route::put('/updatetestimony/{id}', [TestimonyController::class, 'updatetestimony'])->name('updatetestimony');
        // Route::get('/testimonyeapproved/{id}', [TestimonyController::class, 'testimonyeapproved'])->name('testimonyeapproved');
        // Route::get('/testimonyesuspend/{id}', [TestimonyController::class, 'testimonyesuspend'])->name('testimonyesuspend');
        // Route::get('/testimonyedelete/{id}', [TestimonyController::class, 'testimonyedelete'])->name('testimonyedelete');
        // Route::get('/addevent', [CourseController::class, 'addevent'])->name('addevent');
        // Route::post('/createteevent', [CourseController::class, 'createteevent'])->name('createteevent');
        // Route::get('/viewevents', [CourseController::class, 'viewevents'])->name('viewevents');
        // Route::get('/eventeapproved/{slug}', [CourseController::class, 'eventeapproved'])->name('eventeapproved');
        // Route::get('/eventesuspend/{slug}', [CourseController::class, 'eventesuspend'])->name('eventesuspend');
       
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::get('/home', [UserController::class, 'home'])->name('home');
       
        
        // Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        
        
        // Route::get('/logout', [UserController::class, 'logout'])->name('logout'); 
        
       
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
