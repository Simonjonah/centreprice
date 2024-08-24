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

// Route::get('/registerdistributor', function ($ref_no) {
//     $view_franchise = User::where('ref_no', $ref_no)->first();
//     return view('view.registerdistributor', compact('view_franchise'));
// });


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
        Route::get('/approveproduct/{ref_no}', [ProductController::class, 'approveproduct'])->name('approveproduct');
        Route::get('/suspendproduct/{ref_no}', [ProductController::class, 'suspendproduct'])->name('suspendproduct');
        Route::get('/editproduct/{ref_no}', [ProductController::class, 'editproduct'])->name('editproduct');
        Route::get('/viewproducts', [ProductController::class, 'viewproducts'])->name('viewproducts');
        Route::put('/updateproduct/{ref_no}', [ProductController::class, 'updateproduct'])->name('updateproduct');
        Route::get('/deleteproduct/{ref_no}', [ProductController::class, 'deleteproduct'])->name('deleteproduct');
        Route::get('/viewsingleproduct/{ref_no}', [ProductController::class, 'viewsingleproduct'])->name('viewsingleproduct');
        
        Route::post('/createroot', [RootController::class, 'createroot'])->name('createroot');
        Route::get('/addroots', [RootController::class, 'addroots'])->name('addroots');
        Route::get('/viewroots', [RootController::class, 'viewroots'])->name('viewroots');
        Route::get('/editroot/{slug}', [RootController::class, 'editroot'])->name('editroot');
        Route::put('/updatreroot/{slug}', [RootController::class, 'updatreroot'])->name('updatreroot');
        Route::get('/deleteroots/{slug}', [RootController::class, 'deleteroots'])->name('deleteroots');
        
        
        
        Route::get('/deletedistributor/{ref_no2}', [UserController::class, 'deletedistributor'])->name('deletedistributor');
        Route::get('/suspenddistributor/{ref_no2}', [UserController::class, 'suspenddistributor'])->name('suspenddistributor');
        Route::get('/approvedistributor/{ref_no2}', [UserController::class, 'approvedistributor'])->name('approvedistributor');
        Route::get('/viewsingledistributor/{ref_no2}', [UserController::class, 'viewsingledistributor'])->name('viewsingledistributor');
        Route::put('/updatedistributor/{ref_no2}', [UserController::class, 'updatedistributor'])->name('updatedistributor');
        Route::get('/editdistributor/{ref_no}', [UserController::class, 'editdistributor'])->name('editdistributor');
        Route::get('/viewdistributorsadmin', [UserController::class, 'viewdistributorsadmin'])->name('viewdistributorsadmin');
        Route::get('/viewfranchise', [UserController::class, 'viewfranchise'])->name('viewfranchise');
        Route::get('/viewsinglefranchise/{ref_no}', [UserController::class, 'viewsinglefranchise'])->name('viewsinglefranchise');
        Route::get('/approvefranchise/{ref_no}', [UserController::class, 'approvefranchise'])->name('approvefranchise');
        Route::get('/suspendfranchise/{ref_no}', [UserController::class, 'suspendfranchise'])->name('suspendfranchise');
        Route::get('/editfranchise/{ref_no}', [UserController::class, 'editfranchise'])->name('editfranchise');
        Route::put('/updatefranchise/{ref_no}', [UserController::class, 'updatefranchise'])->name('updatefranchise');
        Route::get('/deletefranchise/{ref_no}', [UserController::class, 'deletefranchise'])->name('deletefranchise');
        Route::get('/viewvendorsadmin', [UserController::class, 'viewvendorsadmin'])->name('viewvendorsadmin');
        
        Route::get('/viewsinglevendors/{ref_no3}', [UserController::class, 'viewsinglevendors'])->name('viewsinglevendors');
        Route::put('/updatevendor/{id}', [UserController::class, 'updatevendor'])->name('updatevendor');
        Route::get('/approvevendors/{ref_no3}', [UserController::class, 'approvevendors'])->name('approvevendors');
        Route::get('/suspendvendors/{ref_no3}', [UserController::class, 'suspendvendors'])->name('suspendvendors');
        Route::get('/editvendors/{ref_no3}', [UserController::class, 'editvendors'])->name('editvendors');
        Route::get('/deletevendors/{ref_no3}', [UserController::class, 'deletevendors'])->name('deletevendors');
        Route::get('/deletesubcategory/{slug}', [SubcategoryController::class, 'deletesubcategory'])->name('deletesubcategory');
        
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::get('/addmilestone', [MilestoneController::class, 'addmilestone'])->name('addmilestone');
        Route::get('/home', [AdminController::class, 'home'])->name('home');
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

Route::get('/registerdistributor/{ref_no}', [UserController::class, 'registerdistributor'])->name('registerdistributor');
Route::get('/registervendor/{ref_no2}', [UserController::class, 'registervendor'])->name('registerdistributor');

Route::prefix('web')->name('web.')->group(function() {

    Route::middleware(['guest:web'])->group(function() {
        Route::post('/createfranchise', [UserController::class, 'createfranchise'])->name('createfranchise');
        Route::post('/check', [UserController::class, 'check'])->name('check');
        // Route::get('/registerdistributor/{ref_no}', [UserController::class, 'registerdistributor'])->name('registerdistributor');
        // Route::get('/registerdistributor/{ref_no}', [UserController::class, 'registervendor'])->name('registervendor');
        Route::post('/createdistributor', [UserController::class, 'createdistributor'])->name('createdistributor');
        Route::post('/createvendor', [UserController::class, 'createvendor'])->name('createvendor');
        

    });
    
    Route::middleware(['auth:web'])->group(function() {
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::view('/home','dashboard.home')->name('home');
        Route::get('/home', [UserController::class, 'home'])->name('home');
        Route::put('/updateprofile/{ref_no}', [UserController::class, 'updateprofile'])->name('updateprofile');
        Route::get('/mydistributors', [UserController::class, 'mydistributors'])->name('mydistributors'); 
        Route::get('/viewsingledistributorbyfran/{ref_no2}', [UserController::class, 'viewsingledistributorbyfran'])->name('viewsingledistributorbyfran'); 
        
        Route::get('/profile2', [UserController::class, 'profile2'])->name('profile2');
        Route::get('/myvendors', [UserController::class, 'myvendors'])->name('myvendors');
        Route::get('/viewsinglevendorfran/{ref_no3}', [UserController::class, 'viewsinglevendorfran'])->name('viewsinglevendorfran');
        Route::put('/updateprofile2/{ref_no2}', [UserController::class, 'updateprofile2'])->name('updateprofile2');
        Route::get('/referedby/{ref_no2}', [UserController::class, 'referedby'])->name('referedby');
        Route::get('/myvendorsbydistributor', [UserController::class, 'myvendorsbydistributor'])->name('myvendorsbydistributor');
        Route::get('/myproducts', [ProductController::class, 'myproducts'])->name('myproducts');
        Route::get('/viewproductsbyvendor/{ref_no}', [ProductController::class, 'viewproductsbyvendor'])->name('viewproductsbyvendor');
        
        Route::get('/logout', [UserController::class, 'logout'])->name('logout'); 
        
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
