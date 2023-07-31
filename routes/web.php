<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

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


Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('optimize-clear', function () {
        Artisan::call('optimize:clear');
        return Artisan::output();
    });
    
    Route::get('migrate', function () {
        Artisan::call('migrate');
        return Artisan::output();
    });
    
    Route::get('migrate-fresh', function () {
        Artisan::call('migrate:fresh');
        return Artisan::output();
    });
    
    Route::get('composer-install', function () {
        $exec = shell_exec('composer install');
        return $exec;
    });
    
    Route::get('composer-dump-autoload', function () {
        Artisan::call('composer dump-autoload');
        return '<h1>composer dump-autoload Artisan command executed</h1>';
    });
    
    Route::get('storage-link', function () {
        Artisan::call('storage:link');
        return Artisan::output();
    });
    
    Route::resource('admin/countries', App\Http\Controllers\Admin\CountryController::class)
        ->names([
            'index' => 'admin.countries.index',
            'store' => 'admin.countries.store',
            'show' => 'admin.countries.show',
            'update' => 'admin.countries.update',
            'destroy' => 'admin.countries.destroy',
            'create' => 'admin.countries.create',
            'edit' => 'admin.countries.edit'
        ]);
    Route::resource('admin/case-types', App\Http\Controllers\Admin\CaseTypeController::class)
        ->names([
            'index' => 'admin.caseTypes.index',
            'store' => 'admin.caseTypes.store',
            'show' => 'admin.caseTypes.show',
            'update' => 'admin.caseTypes.update',
            'destroy' => 'admin.caseTypes.destroy',
            'create' => 'admin.caseTypes.create',
            'edit' => 'admin.caseTypes.edit'
        ]);
    Route::resource('admin/organisations', App\Http\Controllers\Admin\OrganisationController::class)
        ->names([
            'index' => 'admin.organisations.index',
            'store' => 'admin.organisations.store',
            'show' => 'admin.organisations.show',
            'update' => 'admin.organisations.update',
            'destroy' => 'admin.organisations.destroy',
            'create' => 'admin.organisations.create',
            'edit' => 'admin.organisations.edit'
        ]);
    Route::resource('admin/case-models', App\Http\Controllers\Admin\CaseModelController::class)
        ->names([
            'index' => 'admin.caseModels.index',
            'store' => 'admin.caseModels.store',
            'show' => 'admin.caseModels.show',
            'update' => 'admin.caseModels.update',
            'destroy' => 'admin.caseModels.destroy',
            'create' => 'admin.caseModels.create',
            'edit' => 'admin.caseModels.edit'
        ]);
    Route::resource('admin/forum-categories', App\Http\Controllers\Admin\ForumCategoriesController::class)
        ->names([
            'index' => 'admin.forumCategories.index',
            'store' => 'admin.forumCategories.store',
            'show' => 'admin.forumCategories.show',
            'update' => 'admin.forumCategories.update',
            'destroy' => 'admin.forumCategories.destroy',
            'create' => 'admin.forumCategories.create',
            'edit' => 'admin.forumCategories.edit'
        ]);
    Route::resource('admin/forum-topics', App\Http\Controllers\Admin\ForumTopicController::class)
        ->names([
            'index' => 'admin.forumTopics.index',
            'store' => 'admin.forumTopics.store',
            'show' => 'admin.forumTopics.show',
            'update' => 'admin.forumTopics.update',
            'destroy' => 'admin.forumTopics.destroy',
            'create' => 'admin.forumTopics.create',
            'edit' => 'admin.forumTopics.edit'
        ]);
    Route::resource('admin/forum-categories', App\Http\Controllers\Admin\ForumCategoryController::class)
        ->names([
            'index' => 'admin.forumCategories.index',
            'store' => 'admin.forumCategories.store',
            'show' => 'admin.forumCategories.show',
            'update' => 'admin.forumCategories.update',
            'destroy' => 'admin.forumCategories.destroy',
            'create' => 'admin.forumCategories.create',
            'edit' => 'admin.forumCategories.edit'
        ]);
});
Route::resource('admin/findings', App\Http\Controllers\Admin\FindingController::class)
    ->names([
        'index' => 'admin.findings.index',
        'store' => 'admin.findings.store',
        'show' => 'admin.findings.show',
        'update' => 'admin.findings.update',
        'destroy' => 'admin.findings.destroy',
        'create' => 'admin.findings.create',
        'edit' => 'admin.findings.edit'
    ]);
Route::resource('admin/information-requests', App\Http\Controllers\Admin\InformationRequestController::class)
    ->names([
        'index' => 'admin.informationRequests.index',
        'store' => 'admin.informationRequests.store',
        'show' => 'admin.informationRequests.show',
        'update' => 'admin.informationRequests.update',
        'destroy' => 'admin.informationRequests.destroy',
        'create' => 'admin.informationRequests.create',
        'edit' => 'admin.informationRequests.edit'
    ]);