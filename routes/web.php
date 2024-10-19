<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LgaController;
use App\Http\Controllers\NgstateController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SubaccountController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransportController;
use App\Models\Admin;
use App\Models\Advert;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Root;
use App\Models\Subscription;
use App\Models\Team;
use App\Models\Testimony;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;


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
    $view_roots = Root::take(4)->get();
    $view_rootscates = Root::all();
    $view_products = Product::latest()->get();
    $view_blogs = Blog::latest()->take(3)->get();
    $view_teams = Team::latest()->take(3)->get();
    $view_testimonies = Testimony::latest()->take(3)->get();
    $view_adverts = Advert::latest()->get();

    return view('welcomes', compact('view_adverts', 'view_testimonies', 'view_teams', 'view_blogs', 'view_products', 'view_rootscates', 'view_roots'));
});



Route::get('/viewrootproducts/{id}', function ($id) {
    // $view_roots = Root::where('id', $id)->first();
    $view_rootsproducts = Product::where('root_id', $id)->get();
    $view_rootsproductscount = Product::where('root_id', $id)->count();

    return view('pages.viewrootproducts', compact('view_rootsproductscount', 'view_rootsproducts'));
});

Route::get('/products/productdetails/{ref_no}', function ($ref_no) {
    $view_singleproducts = Product::where('ref_no', $ref_no)->first();

    return view('pages.productdetails', compact('view_singleproducts'));
});

Route::get('/news/newsdetails/{slug}', function ($slug) {
    $view_singleblog = Blog::where('slug', $slug)->first();
    $archives = Blog::select(
        DB::raw('YEAR(created_at) as year'),
        DB::raw('MONTH(created_at) as month'),
        DB::raw('COUNT(*) as post_count')
    )
    ->groupBy('year', 'month')
    ->orderBy('year', 'desc')
    ->orderBy('month', 'desc')
    ->get();
    $view_allblogs = Blog::latest()->take(3)->get();

    return view('pages.newsdetails', compact('view_allblogs', 'archives', 'view_singleblog'));
});


Route::get('/teams/teamdetails/{ref_no}', function ($ref_no) {
    $view_teamdetails = Team::where('ref_no', $ref_no)->first();

    return view('pages.teamdetails', compact('view_teamdetails'));
});


Route::get('/products1', function () {
    $view_products = Product::latest()->get();
    $count_products = Product::count();

    return view('pages.products1', compact('count_products', 'view_products'));
});


Route::get('/adverts', function () {
    $view_adverts = Advert::latest()->get();
    $count_advert = Advert::count();

    return view('pages.adverts', compact('count_advert', 'view_adverts'));
});

Route::get('/adverts/advertdetails/{slug}', function ($slug) {
    $view_advertsdetails = Advert::where('slug', $slug)->first();
    return view('pages.advertdetails', compact('view_advertsdetails'));
});

Route::get('/blog', function () {
    $view_blogs = Blog::latest()->get();
    return view('pages.blog', compact('view_blogs'));
});

Route::get('/team', function () {
    $view_teams = Team::latest()->get();
    return view('pages.team', compact('view_teams'));
});

Route::get('/about', function () {
    $view_teams = Team::latest()->take(3)->get();
    $view_testimonies = Testimony::latest()->take(3)->get();
    return view('pages.about', compact('view_teams', 'view_testimonies'));
});

Route::get('/services', function(){
    $view_roots = Root::all();
    return view('pages.services', compact('view_roots'));
});

Route::get('/becomemembers', function(){
    $view_roots = Root::all();

    return view('pages.becomemembers', compact('view_roots'));
});

Route::get('/contact', function(){

    return view('pages.contact');
});

Route::get('/terms', function(){

    return view('pages.terms');
});



Route::get('/partners', function(){
    $view_partners = Partner::latest()->get();
    return view('pages.partners', compact('view_partners'));
});

Route::get('/categories/categoryproducts/{id}', function ($id) {
    $view_categoryproducts = Product::where('id', $id)->get();
    $view_categoryproductcounts = Product::where('id', $id)->count();

    return view('pages.categoryproducts', compact('view_categoryproductcounts', 'view_categoryproducts'));
});




// Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
// Laravel 8 & 9

Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');

Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');

// Route::post('buy', [TransactionController::class, 'makeApiRequest']);


Route::post('createusers', [TransactionController::class, 'createusers'])->name('createusers');


Route::post('makepayment', [SaleController::class, 'makepayments']);




Route::get('/payment', [SaleController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment/process', [SaleController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/callback', [SaleController::class, 'paymentCallback'])->name('payment.callback');

Route::get('/payment/success', function () {
    return 'Payment successful';
})->name('payment.success');

Route::get('/payment/failed', function () {
    return 'Payment failed';
})->name('payment.failed');


Route::post('createcontact', [ContactController::class, 'createcontact'])->name('createcontact');
Route::post('cancel', [TransactionController::class, 'cancel']);
// Route::get('/transaction/trancallback', [TransactionController::class, 'handlePaystackCallback'])->name('transaction.trancallback');
// Laravel 8 & 9

Route::get('/thankyou', [SaleController::class, 'thankyou'])->name('thankyou');


// Route::get('/payment/callback/{reference}', [TransactionController::class, 'handleGatewayCallback']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::prefix('admin')->name('admin.')->group(function() {

    Route::middleware(['guest:admin'])->group(function() {
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::view('/register','dashboard.admin.register')->name('register');
        Route::post('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/check', [AdminController::class, 'check'])->name('check');

    });
    
    
    Route::middleware(['auth:admin'])->group(function() {
        
        Route::get('deletepartner/{id}', [PartnerController::class, 'deletepartner'])->name('deletepartner');
        Route::put('updatethepartners/{id}', [PartnerController::class, 'updatethepartners'])->name('updatethepartners');
        Route::get('editpartner/{id}', [PartnerController::class, 'editpartner'])->name('editpartner');
        Route::get('suspendpartner/{id}', [PartnerController::class, 'suspendpartner'])->name('suspendpartner');
        Route::get('approvepartner/{id}', [PartnerController::class, 'approvepartner'])->name('approvepartner');
        Route::get('viewpartners', [PartnerController::class, 'viewpartners'])->name('viewpartners');
        Route::post('createthepartners', [PartnerController::class, 'createthepartners'])->name('createthepartners');
        Route::get('addpartner', [PartnerController::class, 'addpartner'])->name('addpartner');
        Route::get('deletebouts/{id}', [AboutController::class, 'deletebouts'])->name('deletebouts');
        Route::put('updateabout/{id}', [AboutController::class, 'updateabout'])->name('updateabout');
        Route::get('editbouts/{id}', [AboutController::class, 'editbouts'])->name('editbouts');
        Route::get('deletebouts/{id}', [AboutController::class, 'deletebouts'])->name('deletebouts');
        Route::post('createabout', [AboutController::class, 'createabout'])->name('createabout');
        Route::get('viewabout', [AboutController::class, 'viewabout'])->name('viewabout');
        Route::get('addabout', [AboutController::class, 'addabout'])->name('addabout');
        Route::get('viewroles', [AdminController::class, 'viewroles'])->name('viewroles');
        Route::get('deleteplans/{ref_no}', [PlanController::class, 'deleteplans'])->name('deleteplans');
        Route::get('deleteadverts/{ref_no}', [AdvertController::class, 'deleteadverts'])->name('deleteadverts');
        Route::put('updateadverts/{ref_no}', [AdvertController::class, 'updateadverts'])->name('updateadverts');
        Route::get('editadverts/{ref_no}', [AdvertController::class, 'editadverts'])->name('editadverts');
        Route::get('viewsingleadverts/{ref_no}', [AdvertController::class, 'viewsingleadverts'])->name('viewsingleadverts');
        Route::get('suspendadverts/{ref_no}', [AdvertController::class, 'suspendadverts'])->name('suspendadverts');
        Route::get('approveadverts/{ref_no}', [AdvertController::class, 'approveadverts'])->name('approveadverts');
        Route::get('viewadvertments', [AdvertController::class, 'viewadvertments'])->name('viewadvertments');
        Route::put('updateaddphoto5/{ref_no}', [AdvertController::class, 'updateaddphoto5'])->name('updateaddphoto5');
        Route::get('addfouthphoto5/{ref_no}', [AdvertController::class, 'addfouthphoto5'])->name('addfouthphoto5');
        Route::put('updateaddphoto4/{ref_no}', [AdvertController::class, 'updateaddphoto4'])->name('updateaddphoto4');
        Route::get('addfouthphoto4/{ref_no}', [AdvertController::class, 'addfouthphoto4'])->name('addfouthphoto4');
        Route::put('updateaddphoto2/{ref_no}', [AdvertController::class, 'updateaddphoto2'])->name('updateaddphoto2');
        Route::get('addsecondphoto2/{ref_no}', [AdvertController::class, 'addsecondphoto2'])->name('addsecondphoto2');
        Route::put('updateaddphoto/{ref_no}', [AdvertController::class, 'updateaddphoto'])->name('updateaddphoto');
        Route::get('firstadvertphoto/{ref_no}', [AdvertController::class, 'firstadvertphoto'])->name('firstadvertphoto');
        Route::post('createadverts', [AdvertController::class, 'createadverts'])->name('createadverts');
        Route::get('addadverts', [AdvertController::class, 'addadverts'])->name('addadverts');
        Route::get('deletecontact/{id}', [ContactController::class, 'deletecontact'])->name('deletecontact');
        Route::get('viewcontact', [ContactController::class, 'viewcontact'])->name('viewcontact');
        Route::get('/addteam', [TeamController::class, 'addteam'])->name('addteam');
        Route::post('/createteam', [TeamController::class, 'createteam'])->name('createteam');
        Route::get('/viewteam', [TeamController::class, 'viewteam'])->name('viewteam');
        Route::get('/deleteteam/{ref_no}', [TeamController::class, 'deleteteam'])->name('deleteteam');
        Route::get('/editeam/{ref_no}', [TeamController::class, 'editeam'])->name('editeam');
        Route::get('/teamsuspend/{ref_no}', [TeamController::class, 'teamsuspend'])->name('teamsuspend');
        Route::get('/teamapprove/{ref_no}', [TeamController::class, 'teamapprove'])->name('teamapprove');
        
        Route::get('/addtestimony', [TestimonyController::class, 'addtestimony'])->name('addtestimony');
        Route::post('/createtestimony', [TestimonyController::class, 'createtestimony'])->name('createtestimony');
        Route::get('/viewtestimony', [TestimonyController::class, 'viewtestimony'])->name('viewtestimony');
        Route::get('/editestimony/{ref_no}', [TestimonyController::class, 'editestimony'])->name('editestimony');
        Route::put('/updatetestimony/{ref_no}', [TestimonyController::class, 'updatetestimony'])->name('updatetestimony');
        
        Route::get('/testimonyapprove/{ref_no}', [TestimonyController::class, 'testimonyapprove'])->name('testimonyapprove');
        Route::get('/testimonysuspend/{ref_no}', [TestimonyController::class, 'testimonysuspend'])->name('testimonysuspend');
        Route::get('/deletetestimony/{ref_no}', [TestimonyController::class, 'deletetestimony'])->name('deletetestimony');
        
        Route::get('/addblog', [BlogController::class, 'addblog'])->name('addblog');
        Route::post('/createblog', [BlogController::class, 'createblog'])->name('createblog');
        Route::get('/viewblog', [BlogController::class, 'viewblog'])->name('viewblog');
        Route::get('/ediblog/{ref_no}', [BlogController::class, 'ediblog'])->name('ediblog');
        Route::put('/updateblog/{slug}', [BlogController::class, 'updateblog'])->name('updateblog');
        Route::get('/blogapprove/{ref_no}', [BlogController::class, 'blogapprove'])->name('blogapprove');
        Route::get('/blogsuspend/{ref_no}', [BlogController::class, 'blogsuspend'])->name('blogsuspend');
        Route::get('/deleteblog/{ref_no}', [BlogController::class, 'deleteblog'])->name('deleteblog');
        
        
        
        Route::get('/addsubcription', [SubscriptionController::class, 'addsubcription'])->name('addsubcription');
        Route::get('/viewsubcription', [SubscriptionController::class, 'viewsubcription'])->name('viewsubcription');
        Route::post('/createsubcription', [SubscriptionController::class, 'createsubcription'])->name('createsubcription');
        Route::get('/editsubscription/{id}', [SubscriptionController::class, 'editsubscription'])->name('editsubscription');
        Route::put('/updatesubcription/{id}', [SubscriptionController::class, 'updatesubcription'])->name('updatesubcription');
        Route::get('/deletesubscription/{id}', [SubscriptionController::class, 'deletesubscription'])->name('deletesubscription');
        Route::get('/distributorsubcription', [SubscriptionController::class, 'distributorsubcription'])->name('distributorsubcription');
        Route::get('/vendorsubcription', [SubscriptionController::class, 'vendorsubcription'])->name('vendorsubcription');
        
        Route::get('/viewsubscriptionpayment/{user_id}', [SubscriptionController::class, 'viewsubscriptionpayment'])->name('viewsubscriptionpayment');
        Route::get('/vieworders', [SaleController::class, 'vieworders'])->name('vieworders');
        Route::get('/viewsingleorderadmin/{ref_no}', [SaleController::class, 'viewsingleorderadmin'])->name('viewsingleorderadmin');
        Route::get('/deliveredorder/{ref_no}', [SaleController::class, 'deliveredorder'])->name('deliveredorder');
        Route::get('/suspendorder/{ref_no}', [SaleController::class, 'suspendorder'])->name('suspendorder');
        Route::get('/suspendorderadmin/{ref_no}', [SaleController::class, 'suspendorderadmin'])->name('suspendorderadmin');
        Route::get('/deleteorderadmin/{ref_no}', [SaleController::class, 'deleteorderadmin'])->name('deleteorderadmin');
        Route::get('/deleteorderadmin/{ref_no}', [SaleController::class, 'deleteorderadmin'])->name('deleteorderadmin');
        
        Route::get('/addplan', [PlanController::class, 'addplan'])->name('addplan');
        Route::get('/viewplan', [PlanController::class, 'viewplan'])->name('viewplan');
        Route::post('/createplan', [PlanController::class, 'createplan'])->name('createplan');
        Route::get('/editplans/{id}', [PlanController::class, 'editplans'])->name('editplans');
        Route::put('/updateplan/{id}', [PlanController::class, 'updateplan'])->name('updateplan');
        Route::get('/deleteplan/{id}', [PlanController::class, 'deleteplan'])->name('deleteplan');

        Route::get('/addlga', [LgaController::class, 'addlga'])->name('addlga');
        Route::post('/createmilestone', [MilestoneController::class, 'createmilestone'])->name('createmilestone');
        Route::get('/viewmilestones', [MilestoneController::class, 'viewmilestones'])->name('viewmilestones');
        Route::get('/editmilstone/{id}', [MilestoneController::class, 'editmilstone'])->name('editmilstone');
        Route::put('/updatemilstone/{id}', [MilestoneController::class, 'updatemilstone'])->name('updatemilstone');
        Route::get('/deletemilestone/{id}', [MilestoneController::class, 'deletemilestone'])->name('deletemilestone');
       
        Route::put('/updatecategory/{id}', [CategoryController::class, 'updatecategory'])->name('updatecategory');
        Route::get('/editcategory/{id}', [CategoryController::class, 'editcategory'])->name('editcategory');
        Route::get('/viewcategory', [CategoryController::class, 'viewcategory'])->name('viewcategory');
        Route::get('/addcategory/{ref_no}', [RootController::class, 'addcategory'])->name('addcategory');
        Route::post('/createcategory', [CategoryController::class, 'createcategory'])->name('createcategory');
        Route::get('/addsubcategory/{ref_no}', [CategoryController::class, 'addsubcategory'])->name('addsubcategory');
        Route::post('/createsubcategory', [SubcategoryController::class, 'createsubcategory'])->name('createsubcategory');
        Route::get('/viewsubcategory', [SubcategoryController::class, 'viewsubcategory'])->name('viewsubcategory');
        Route::get('/editsubcategory/{slug}', [SubcategoryController::class, 'editsubcategory'])->name('editsubcategory');
        Route::put('/updatesubcategory/{slug}', [SubcategoryController::class, 'updatesubcategory'])->name('updatesubcategory');
        
        Route::get('/addproducts/{ref_no}', [SubcategoryController::class, 'addproducts'])->name('addproducts');
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
        Route::get('/viewsingledistributor/{ref_no}', [UserController::class, 'viewsingledistributor'])->name('viewsingledistributor');
        Route::put('/updatedistributor/{ref_no2}', [UserController::class, 'updatedistributor'])->name('updatedistributor');
        Route::get('/editdistributor/{ref_no}', [UserController::class, 'editdistributor'])->name('editdistributor');
        Route::get('/viewdistributorsadmin', [UserController::class, 'viewdistributorsadmin'])->name('viewdistributorsadmin');
        Route::get('/viewfranchise', [UserController::class, 'viewfranchise'])->name('viewfranchise');
        Route::get('/viewdistributors/{ref_no}', [UserController::class, 'viewdistributors'])->name('viewdistributors');
        Route::get('/viewsinglefranchise/{ref_no}', [UserController::class, 'viewsinglefranchise'])->name('viewsinglefranchise');
        Route::get('/approvefranchise/{ref_no}', [UserController::class, 'approvefranchise'])->name('approvefranchise');
        Route::get('/suspendfranchise/{ref_no}', [UserController::class, 'suspendfranchise'])->name('suspendfranchise');
        Route::get('/editfranchise/{ref_no}', [UserController::class, 'editfranchise'])->name('editfranchise');
        Route::put('/updatefranchise/{id}', [UserController::class, 'updatefranchise'])->name('updatefranchise');
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
        Route::get('/addtransport', [TransportController::class, 'addtransport'])->name('addtransport');
        Route::post('/createtransport', [TransportController::class, 'createtransport'])->name('createtransport');
        Route::get('/viewtransports', [TransportController::class, 'viewtransports'])->name('viewtransports');
        Route::get('/edittransport/{ref_no}', [TransportController::class, 'edittransport'])->name('edittransport');
        Route::put('/updatetransport/{ref_no}', [TransportController::class, 'updatetransport'])->name('updatetransport');
        Route::get('/deletetrans/{ref_no}', [TransportController::class, 'deletetrans'])->name('deletetrans');
        
        Route::get('/deleterole/{ref_no}', [AdminController::class, 'deleterole'])->name('deleterole');
        Route::get('/rolesuspend/{ref_no}', [AdminController::class, 'rolesuspend'])->name('rolesuspend');
        Route::get('/roleapprove/{ref_no}', [AdminController::class, 'roleapprove'])->name('roleapprove');
        Route::get('/assignroles/{ref_no}', [AdminController::class, 'assignroles'])->name('assignroles');
        Route::put('/updateroles/{ref_no}', [AdminController::class, 'updateroles'])->name('updateroles');
        
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
Route::get('/registervendor/{ref_no}', [UserController::class, 'registervendor'])->name('registervendor');
Route::get('/referregistervendor/{ref_no2}', [UserController::class, 'referregistervendor'])->name('referregistervendor');
Route::post('/createfranchise', [TransactionController::class, 'createfranchise'])->name('createfranchise');

Route::prefix('web')->name('web.')->group(function() {

    Route::middleware(['guest:web'])->group(function() {
        Route::post('/check', [UserController::class, 'check'])->name('check');
        // Route::get('/registerdistributor/{ref_no}', [UserController::class, 'registerdistributor'])->name('registerdistributor');
        // Route::get('/registerdistributor/{ref_no}', [UserController::class, 'registervendor'])->name('registervendor');
        Route::post('/createdistributor', [UserController::class, 'createdistributor'])->name('createdistributor');
        Route::post('/createvendor', [UserController::class, 'createvendor'])->name('createvendor');
        Route::post('/createsubvendor', [UserController::class, 'createsubvendor'])->name('createsubvendor');
        

    });
    
    Route::middleware(['auth:web'])->group(function() {
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::view('/home','dashboard.home')->name('home');
        Route::get('/home', [UserController::class, 'home'])->name('home');
        Route::get('/resetmypassword', [UserController::class, 'resetmypassword'])->name('resetmypassword');
        Route::put('/changepassword/{id}', [UserController::class, 'changepassword'])->name('changepassword');
        
        Route::put('/updateprofile/{ref_no}', [UserController::class, 'updateprofile'])->name('updateprofile');
        Route::get('/mydistributors', [UserController::class, 'mydistributors'])->name('mydistributors'); 
        Route::get('/viewsingledistributorbyfran/{ref_no2}', [UserController::class, 'viewsingledistributorbyfran'])->name('viewsingledistributorbyfran'); 
        Route::get('/lockscreen', [UserController::class, 'lockscreen'])->name('lockscreen'); 
        Route::post('/screenlogin', [UserController::class, 'screenlogin'])->name('screenlogin'); 
        Route::get('/myvendorsbyvendors', [UserController::class, 'myvendorsbyvendors'])->name('myvendorsbyvendors'); 
        Route::get('/viewmypurchases', [SaleController::class, 'viewmypurchases'])->name('viewmypurchases'); 
        Route::get('/viewgoodsbyvendor/{ref_no}', [SaleController::class, 'viewgoodsbyvendor'])->name('viewgoodsbyvendor'); 
        Route::get('/deletepurchse/{ref_no}', [SaleController::class, 'deletepurchse'])->name('deletepurchse'); 
        Route::get('/productreceived/{ref_no}', [SaleController::class, 'productreceived'])->name('productreceived'); 
        Route::get('/viewmypurchasesdist', [SaleController::class, 'viewmypurchasesdist'])->name('viewmypurchasesdist'); 
        
        
        Route::get('/profile3', [UserController::class, 'profile3'])->name('profile3');
        Route::get('/profile2', [UserController::class, 'profile2'])->name('profile2');
        Route::get('/myvendors', [SaleController::class, 'myvendors'])->name('myvendors');

        Route::get('/viewmyvendorsales/{id}', [UserController::class, 'viewmyvendorsales'])->name('viewmyvendorsales');
        
        Route::get('/viewsinglevendorfran/{ref_no}', [UserController::class, 'viewsinglevendorfran'])->name('viewsinglevendorfran');
        Route::put('/updateprofile2/{id}', [UserController::class, 'updateprofile2'])->name('updateprofile2');
        Route::get('/referedby/{ref_no2}', [UserController::class, 'referedby'])->name('referedby');
        Route::get('/myvendorsbydistributor', [UserController::class, 'myvendorsbydistributor'])->name('myvendorsbydistributor');
        Route::get('/myproducts', [ProductController::class, 'myproducts'])->name('myproducts');
        Route::get('/addsubaccount', [SubaccountController::class, 'addsubaccount'])->name('addsubaccount');
        Route::post('/createSubaccount', [SubaccountController::class, 'createWallet'])->name('createWallet');
        
        Route::get('/logout', [UserController::class, 'logout'])->name('logout'); 
        Route::get('/franchisesubscription', [PlanController::class, 'franchisesubscription'])->name('franchisesubscription');
        Route::get('/mysubscriptions', [SubscriptionController::class, 'mysubscriptions'])->name('mysubscriptions');
        Route::get('/cancelsubscription/{id}', [SubscriptionController::class, 'cancelsubscription'])->name('cancelsubscription');
        Route::get('/mytransctions', [TransactionController::class, 'mytransctions'])->name('mytransctions');
        Route::get('/printspayment/{id}', [TransactionController::class, 'printspayment'])->name('printspayment');
        Route::post('/renew/{id}', [TransactionController::class, 'renew'])->name('renew');
        Route::get('/viewsubscriptionpayment/{user_id}', [SubscriptionController::class, 'viewsubscriptionpayment'])->name('viewsubscriptionpayment');
        Route::get('/ordermyproducts/{ref_no}', [ProductController::class, 'ordermyproducts'])->name('ordermyproducts');
        Route::post('/createorders', [OrderController::class, 'createorders'])->name('createorders');
        Route::get('/myorderproducts', [OrderController::class, 'myorderproducts'])->name('myorderproducts');
        Route::get('/suspendorder/{ref_no}', [OrderController::class, 'suspendorder'])->name('suspendorder');
        Route::get('/editorder/{ref_no}', [OrderController::class, 'editorder'])->name('editorder');
        Route::get('/viewsingleorder/{ref_no}', [OrderController::class, 'viewsingleorder'])->name('viewsingleorder');
        Route::get('/deleteorder/{ref_no}', [OrderController::class, 'deleteorder'])->name('deleteorder');
        Route::get('/myproductliners', [OrderController::class, 'myproductliners'])->name('myproductliners');
        Route::get('/myvendorproducts', [ProductController::class, 'myvendorproducts'])->name('myvendorproducts');
        Route::get('/addtocart/{id}', [CartController::class, 'addtocart'])->name('addtocart');
        
        Route::get('/viewcarts', [CartController::class, 'viewcarts'])->name('viewcarts');
        Route::get('/viewcart', [CartController::class, 'viewcart'])->name('viewcart');
        Route::get('/viewproductsbyvendor/{ref_no}', [ProductController::class, 'viewproductsbyvendor'])->name('viewproductsbyvendor');
        Route::get('/viewproductsbyvendoronly/{ref_no}', [ProductController::class, 'viewproductsbyvendoronly'])->name('viewproductsbyvendoronly');
        
        //Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
        Route::get('/remove/{id}', [CartController::class, 'remove'])->name('remove');
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::get('/transaction/callback', [TransactionController::class, 'transactionCallback'])->name('transaction.callback');
Route::get('/transaction/callback', [TransactionController::class, 'transactionCallback'])->name('transaction.callback');

Route::get('/transaction/success', function () {
    return 'transaction successful';
})->name('transaction.success');

Route::get('/transaction/failed', function () {
    return 'transaction failed';
})->name('transaction.failed');

