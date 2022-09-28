<?php

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\FrontierController;
use App\Http\Controllers\Auth\CharacterController;


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

Route::get('/test', function () {
    $string = "anthaleja";
    dd(ucfirst(Str::camel($string)));
});


// Frontier
require_once('ath/frontier.php');


Route::group(['middleware' => ['auth']], function () {
    // Home page
    Route::get('/', function () {
        return redirect('/home');
    });
    Route::view('/home', 'frontend.home', ['title' => 'Home'])->name('home');


    // Character
    Route::post('character/store', [CharacterController::class, 'store'])->name('character.store');
});

// Bank
require_once('ath/bank.php');

// News
require_once('ath/news.php');


require_once('ath/natter.php');
require_once('ath/natter_community.php');

require_once('ath/portfolio.php');

// Ryadep
// Route::get('ryadep', [ChannelController::class, 'index'])->name('ryadep');
// Route::get('ryadep/channel/create', [ChannelController::class, 'create'])->name('ryadep.channel.create');
// Route::post('ryadep/channel/store', [ChannelController::class, 'store'])->name('ryadep.channel.store');
// Route::get('ryadep/channel/{slug}/edit', [ChannelController::class, 'edit'])->name('ryadep.channel.edit');
// Route::post('ryadep/channel/{slug}/update', [ChannelController::class, 'update'])->name('ryadep.channel.update');

// Shop
// Route::get('market', [MarketController::class, 'index'])->name('market');

// Wiki
// Route::get('wiki', [WikiController::class, 'index'])->name('wiki');
// Route::get('wiki/list/{action?}', [WikiController::class, 'list'])->name('wiki.list');
// Route::get('wiki/add', [WikiController::class, 'manage'])->name('wiki.add');
// Route::post('wiki/save', [WikiController::class, 'store'])->name('wiki.save');
// Route::get('wiki/{id}/edit', [WikiController::class, 'manage'])->name('wiki.edit');
// Route::post('wiki/update/{id}', [WikiController::class, 'update'])->name('wiki.update');
// Route::get('wiki/{slug}', [WikiController::class, 'show'])->name('wiki.show');
// Route::get('wiki/{id}/delete', [WikiController::class, 'delete'])->name('wiki.delete');
// Route::get('wiki/{id}/restore', [WikiController::class, 'restore'])->name('wiki.restore');
// Route::get('wiki/{id}/destroy', [WikiController::class, 'destroy'])->name('wiki.destroy');


Route::middleware(['auth', 'permission:school'])->name('admin.')->prefix('admin')->group(function () {
    // School
    require_once('ath/school_courses.php');
    require_once('ath/school_teachers.php');
    require_once('ath/school_students.php');
});
//         Route::group(
//             ['middleware' => ['auth', 'vendor']],
//             function () {

//                 // Shop
//                 // -- Brands
//                 Route::get('admin/brands', [BrandController::class, 'index'])->name('admin.brands');
//             }
//         );

//     }
// );

Route::get('profile', [ProfileController::class, 'myProfile'])->name('profile');
Route::get('profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
