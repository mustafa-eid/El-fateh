<?php

use App\Http\Controllers\Dashboard\PerviousWorkController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSite\AboutController;
use App\Http\Controllers\WebSite\ArticleController;
use App\Http\Controllers\WebSite\HomeController;
use App\Http\Controllers\WebSite\RequestUserController;
use App\Http\Controllers\WebSite\SearchController;
use App\Http\Controllers\WebSite\WebBranchController;
use App\Http\Controllers\WebSite\WhyUsController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

// Route::get('/{locale}', function (string $locale) {
//     if (!in_array($locale, ['en', 'ar'])) {
//         abort(400);
//     }
//     return redirect()->back();
// })->middleware(['locale'])->name('localeChange');

Route::get('/localization/{locale}',[LocaleController::class, 'changeLocale'])->name('localeChange');

// Route::get('/', function(){

//     return redirect()->to(session('locale'));
// });

Route::get('/symlink', function () {
   $target =$_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
   $link = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
   symlink($target, $link);
   echo "Done";
});

// Route::get('/symlink', function () {
//     $target = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
//     $link = $_SERVER['DOCUMENT_ROOT'].'/public/storage';

//     // Check if the symlink already exists
//     if (file_exists($link)) {
//         // Unlink the existing symlink
//         unlink($link);
//     }

//     // Create the symlink
//     symlink($target, $link);

//     echo "Symlink created successfully.";
// });

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('migrate');
    //  Artisan::call('storage:link');
    return "Cache cleared successfully";
 });//

    Route::get('/', [HomeController::class, 'index'])->name('website');

    Route::get('/previousWorks/{category_id}', [HomeController::class, 'allPreviousWorks'])->name('allPreviousWorks');
    
    Route::get('/previousWork/{previousWork_id}', [HomeController::class, 'previousWork'])->name('previousWork');
    
    Route::get('/whyUs', [WhyUsController::class, 'index'])->name('whyUs.index');
    
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    
    Route::get('/front-articles', [ArticleController::class, 'index'])->name('front_articles.index');
    
    Route::get('/show-articles/{articleCategoryId}', [ArticleController::class, 'showArticles'])->name('show_articles');

    Route::get('/front-articles/{id}', [ArticleController::class, 'show'])->name('front-articles.show');

    Route::post('/comments', [ArticleController::class, 'store'])->name('comments.store');
    
    Route::resource('requestUser', RequestUserController::class);

    Route::get('/web-branches', [WebBranchController::class, 'index'])->name('web_branches.index');
    
    Route::get('/search', [SearchController::class, 'search'])->name('search');


require __DIR__.'/admin.php';

require __DIR__.'/auth.php';

require __DIR__.'/dashboard.php';
