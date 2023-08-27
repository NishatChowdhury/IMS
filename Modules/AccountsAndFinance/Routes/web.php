<?php

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

use Illuminate\Support\Facades\Route;
use Modules\AccountsAndFinance\Http\Controllers\AccountingController;
use Modules\AccountsAndFinance\Http\Controllers\ChartOfAccountController;
use Modules\AccountsAndFinance\Http\Controllers\FeeCartController;
use Modules\AccountsAndFinance\Http\Controllers\FeeCategoryController;
use Modules\AccountsAndFinance\Http\Controllers\FeeCollectionController;
use Modules\AccountsAndFinance\Http\Controllers\FeeSetupController;
use Modules\AccountsAndFinance\Http\Controllers\JournalController;
use Modules\AccountsAndFinance\Http\Controllers\PlaylistController;
use Modules\AccountsAndFinance\Http\Controllers\TransportController;

Route::prefix('accountsandfinance')->group(function() {
    Route::get('/', 'AccountsAndFinanceController@index')->name('accounts-n-finance');
});


Route::prefix('admin')->group(function() {
    # ------------------------------- Fee Management/ Tuition Fee ------------------------------------------
    // Fee Category
    Route::get('/fee-category/index',[FeeCategoryController::class,'index'])->name('fee-category.index');
    Route::post('/fee-category/search',[FeeCategoryController::class,'search'])->name('fee_categories.search');
    Route::post('fee-category/store',[FeeCategoryController::class,'store_fee_category'])->name('fee-category.store');
    Route::post('fee-category/edit',[FeeCategoryController::class,'edit_fee_category'])->name('fee-category.edit');
    Route::post('fee-category/update',[FeeCategoryController::class,'update_fee_category'])->name('fee-category.update');
    Route::get('fee-category/{id}/delete',[FeeCategoryController::class,'delete_fee_category'])->name('fee-category.delete');
    Route::put('fee-category/status/{id}',[FeeCategoryController::class,'status'])->name('fee-category.status');

    Route::get('fee-category/fee_setup/{classId}',[FeeCategoryController::class,'fee_setup'])->name('fee-setup.fee_setup');
    // Route::post('fee_setup/store/{classId}','Backend\FeeCategoryController@store_fee_setup')->name('fee-setup.store');
    Route::get('fee_setup/list/{classId}',[FeeCategoryController::class,'list_fee_setup'])->name('fee-setup.list');
    Route::get('fee_setup/show/{id}', [FeeCategoryController::class,'show_fee_setup'])->name('fee-setup.show');
    Route::patch('fee_setup/{id}/update',[FeeCategoryController::class,'update_fee_setup'])->name('fee-setup.update');

    // Fee Setup
    Route::get('fee/fee-setup',[FeeSetupController::class,'create'])->name('fee-setup.create');
    Route::post('fee/fee-setup/store',[FeeSetupController::class,'store'])->name('fee-setup.store');
    Route::get('fee/fee-setup/view',[FeeSetupController::class,'index'])->name('fee-setup.index');
    Route::get('fee/fee-setup/fee-students/{id}',[FeeSetupController::class,'feeStudents'])->name('fee-setup.feeStudents');
    Route::get('fee/fee-setup/feeSetupDetails/{id}',[FeeSetupController::class,'feeSetupDetails'])->name('fee-setup.feeSetupDetails');
    Route::get('fee/fee-setup/search',[FeeSetupController::class,'search'])->name('fee-setup.search');
    Route::get('fee/fee-setup/edit/{id}',[FeeSetupController::class,'edit'])->name('fee-setup.edit');

    Route::get('fee/fee-setup/edit-by-student/{id}',[FeeSetupController::class,'editByStudent'])->name('fee-setup.editByStudent');
    Route::patch('fee/fee-setup/update-by-student/{id}',[FeeSetupController::class,'updateByStudent'])->name('fee-setup.updateByStudent');

    Route::patch('fee/fee-setup/update/{id}',[FeeSetupController::class,'update'])->name('fee.fee-setup.update');
    Route::post('fee/fee-setup/delete/{id}',[FeeSetupController::class,'destroy'])->name('fee.fee-setup.delete');

    // fee cart
    Route::post('fee/fee-cart/store',[FeeCartController::class,'store'])->name('fee-cart.store');
    Route::post('fee/fee-cart/destroy',[FeeCartController::class,'destroy'])->name('fee-cart.destroy');
    Route::post('fee/fee-cart/flush',[FeeCartController::class,'flush'])->name('fee-cart.flush');

    Route::post('fee/edit-fee-cart/destroy',[FeeCartController::class,'EditFeeCartDestroy'])->name('fee.EditFeeCartDestroy');

    
    //Route for fee collection
    Route::get('fee/fee-collection', [FeeCollectionController::class, 'index'])->name('fee-collection.index');
    Route::get('fee/fee-collection/view', [FeeCollectionController::class, 'view'])->name('fee-collection.view');
    Route::post('fee/fee-collection/store', [FeeCollectionController::class, 'store'])->name('fee-collection.store');
    Route::get('fee/bulk-fee-collection', [FeeCollectionController::class, 'bulkFeeCollection'])->name('fee-collection.bulk');
    Route::get('fee/all-collections', [FeeCollectionController::class, 'allCollections'])->name('fee-collection.allCollections');
    Route::get('fee/all-collection/report/{id}', [FeeCollectionController::class, 'report'])->name('fee-collection.report');
    Route::get('fee/collections/report/generate', [FeeCollectionController::class, 'reportGenerate'])->name('report.generate');
    Route::get('fee/collections/report/academic_class', [FeeCollectionController::class, 'academicClassReport'])->name('report.academic_class');
    Route::get('fee/collections/pdf/classReport', [FeeCollectionController::class, 'pdfClassReport'])->name('pdf.classReport');
    Route::get('fee/collections/pdf/dateWiseReport', [FeeCollectionController::class, 'pdfDateReport'])->name('pdf.dateWiseReport');
    Route::post('fee/collection/delete/{id}',[FeeCollectionController::class,'destroy'])->name('fee-collection.delete');

    // Student Transport management
    Route::get('fee-category/transport',[TransportController::class,'index'])->name('transport.index');
    Route::post('fee-category/transport',[TransportController::class,'store'])->name('transport.store');
    Route::get('transport/edit/{id}',[TransportController::class,'edit'])->name('transport.edit');
    Route::patch('transport/update/{id}',[TransportController::class,'update'])->name('transport.update');
    Route::get('transport/student-list',[TransportController::class,'student_list'])->name('transport.student-list');
    Route::post('transport/assign',[TransportController::class,'transport_assign'])->name('transport.assign');
    // Student Transport management End

    # ------------------------------- Accounts ------------------------------------------
    // Journal Routes
    Route::resource('journals', JournalController::class)->middleware('auth');
    Route::get('journal/classic',[JournalController::class,'classic'])->name('journal.classic');
    Route::get('cash-book',[AccountingController::class,'cashBook'])->name('journal.cashBook');
    Route::post('cash-book-settings',[AccountingController::class,'cashBookSetting'])->name('journal.cashBookSetting');
    Route::get('ledger',[AccountingController::class,'ledger'])->name('journal.ledger');
    Route::get('trial-balance',[AccountingController::class,'trialBalance'])->name('journal.trialBalance');
    Route::get('profit-n-loss',[AccountingController::class,'profitNLoss'])->name('journal.profitNLoss');
    Route::get('balance-sheet',[AccountingController::class,'balanceSheet'])->name('journal.balanceSheet');

    // Chart of Accounts
    Route::get('coa', [ChartOfAccountController::class,'index'])->name('coa.name');
    Route::get('coa/create', [ChartOfAccountController::class,'create'])->name('coa.create');
    Route::post('coa/store', [ChartOfAccountController::class,'store'])->name('coa.store');
    Route::get('coa/edit/{id}', [ChartOfAccountController::class,'edit'])->name('coa.edit');
    Route::patch('coa/{id}/update', [ChartOfAccountController::class,'update'])->name('coa.update');
    Route::delete('coa/destroy/{id}', [ChartOfAccountController::class,'destroy'])->name('coa.destroy');
    Route::post('coa/status', [ChartOfAccountController::class,'isEnabled'])->name('coa.isEnabled');

});