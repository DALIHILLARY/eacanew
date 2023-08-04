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
        return redirect()->route('home');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
Route::resource('admin/users', App\Http\Controllers\Admin\UserController::class)
    ->names([
        'index' => 'admin.users.index',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
        'create' => 'admin.users.create',
        'edit' => 'admin.users.edit'
    ]);
Route::resource('admin/tags', App\Http\Controllers\Admin\TagController::class)
    ->names([
        'index' => 'admin.tags.index',
        'store' => 'admin.tags.store',
        'show' => 'admin.tags.show',
        'update' => 'admin.tags.update',
        'destroy' => 'admin.tags.destroy',
        'create' => 'admin.tags.create',
        'edit' => 'admin.tags.edit'
    ]);
Route::resource('admin/news-posts', App\Http\Controllers\Admin\NewsPostController::class)
    ->names([
        'index' => 'admin.newsPosts.index',
        'store' => 'admin.newsPosts.store',
        'show' => 'admin.newsPosts.show',
        'update' => 'admin.newsPosts.update',
        'destroy' => 'admin.newsPosts.destroy',
        'create' => 'admin.newsPosts.create',
        'edit' => 'admin.newsPosts.edit'
    ]);
Route::resource('admin/events', App\Http\Controllers\Admin\EventController::class)
    ->names([
        'index' => 'admin.events.index',
        'store' => 'admin.events.store',
        'show' => 'admin.events.show',
        'update' => 'admin.events.update',
        'destroy' => 'admin.events.destroy',
        'create' => 'admin.events.create',
        'edit' => 'admin.events.edit'
    ]);
Route::resource('admin/publications', App\Http\Controllers\Admin\PublicationController::class)
    ->names([
        'index' => 'admin.publications.index',
        'store' => 'admin.publications.store',
        'show' => 'admin.publications.show',
        'update' => 'admin.publications.update',
        'destroy' => 'admin.publications.destroy',
        'create' => 'admin.publications.create',
        'edit' => 'admin.publications.edit'
    ]);
Route::resource('admin/blog-posts', App\Http\Controllers\Admin\BlogPostController::class)
    ->names([
        'index' => 'admin.blogPosts.index',
        'store' => 'admin.blogPosts.store',
        'show' => 'admin.blogPosts.show',
        'update' => 'admin.blogPosts.update',
        'destroy' => 'admin.blogPosts.destroy',
        'create' => 'admin.blogPosts.create',
        'edit' => 'admin.blogPosts.edit'
    ]);

Route::resource('admin/mail-box', App\Http\Controllers\Admin\MailBoxController::class)
    ->names([
        'index' => 'admin.mailBox.index',
        'store' => 'admin.mailBox.store',
        'show' => 'admin.mailBox.show',
        'update' => 'admin.mailBox.update',
        'destroy' => 'admin.mailBox.destroy',
        'create' => 'admin.mailBox.create',
        'edit' => 'admin.mailBox.edit'
    ]);
// For file uploads
Route::post('uploads/process', [App\Http\Controllers\FileUploadController::class, 'process'])->name('uploads.process');


// SetUp scripts

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
    $exec = shell_exec('php composer.phar install');
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