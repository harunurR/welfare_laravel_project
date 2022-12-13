<?php

use App\Http\Controllers\AccountHeadReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController as auth;
use App\Http\Controllers\InvestorInformationController;
use App\Http\Controllers\MasterAccountController;
use App\Http\Controllers\SubHeadController;
use App\Http\Controllers\ChildOneController;
use App\Http\Controllers\ChildTwoController;
use App\Http\Controllers\AccountHeadsController;
use App\Http\Controllers\BalanceSheetController;
use App\Http\Controllers\ClientInfoController;
use App\Http\Controllers\ClientPaymentController;
use App\Http\Controllers\CreditVoucherController;
use App\Http\Controllers\FeeCategoryController;
use App\Http\Controllers\InvestorPaymentController;
use App\Http\Controllers\MonthlyFeesController;
use App\Http\Controllers\NavigationHeadViewController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DebitVoucherController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\IncomeStatementController;
use App\Http\Controllers\JournalVoucherController;
use App\Http\Controllers\ProfitPortfolioController;
use App\Http\Controllers\ProjectInfoController;
use App\Http\Controllers\ReceptPaymentAccountController;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\TrialBalanceController;


/* Middleware */
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isOwner;

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
Route::get('/register', [auth::class,'signUpForm'])->name('register');
Route::post('/register', [auth::class,'signUpStore'])->name('register.store');
Route::get('/', [auth::class,'signInForm'])->name('signIn');
Route::get('/login', [auth::class,'signInForm'])->name('login');
Route::post('/login', [auth::class,'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class,'signOut'])->name('logOut');


Route::group(['middleware'=>isAdmin::class],function(){
    Route::prefix('admin')->group(function(){
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('admin.dashboard');

    });
});

Route::group(['middleware'=>isOwner::class],function() {
    Route::prefix('owner')->group(function() {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('owner.dashboard');

    });
});


Route::resource('investor',InvestorInformationController::class);
Route::resource('document',DocumentController::class);
Route::resource('regulation',RegulationController::class);
Route::resource('masterAccount',MasterAccountController::class);
Route::resource('subHead',SubHeadController::class);
Route::resource('childOne',ChildOneController::class);
Route::resource('childTwo',ChildTwoController::class);
Route::get('accountheadview',[AccountHeadsController::class,'index'])->name('accountheadview');
Route::resource('investorPayment',InvestorPaymentController::class);
Route::get('paymentajax',[InvestorPaymentController::class,'paymentajax'])->name('paymentAjax');
Route::resource('project',ProjectController::class);
Route::resource('feeCategory',FeeCategoryController::class);
Route::resource('monthlyFees',MonthlyFeesController::class);
Route::resource('navigationHeadView',NavigationHeadViewController::class);
Route::resource('drvoucher',DebitVoucherController::class);
Route::get('debit_get_head', [DebitvoucherController::class, 'get_head'])->name('debit_get_head');
Route::resource('creditVoucher',CreditVoucherController::class);
Route::resource('journalVoucher',JournalVoucherController::class);
Route::get('journal_get_head', [JournalVoucherController::class, 'get_head'])->name('journal_get_head');
Route::resource('trialBalance',TrialBalanceController::class);
Route::resource('accountHeadReport',AccountHeadReportController::class);

Route::get('incomeStatement',[IncomeStatementController::class,'index'])->name('incomeStatement.index');
Route::get('incomeStatement_details',[IncomeStatementController::class,'details'])->name('incomeStatement.details');

Route::resource('clientInfo',ClientInfoController::class);
Route::resource('projectInfo',ProjectInfoController::class);
Route::resource('profitPortfolio',ProfitPortfolioController::class);
Route::resource('balanceSheet',BalanceSheetController::class);
Route::resource('clientPayment',ClientPaymentController::class);
Route::resource('receptPaymentAccount',ReceptPaymentAccountController::class);
Route::get('project_details',[ClientPaymentController::class,'project_details'])->name('project_details');
Route::get('react', function () {
    return view('welcome');
});