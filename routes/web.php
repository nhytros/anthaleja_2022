<?php

use App\Helpers\Astro;
use App\Helpers\ATHDateTime;
use App\Helpers\ATHDateInterval;
use App\Helpers\Markdown\Markdown;
use App\Helpers\ATHDateTimeInterval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BankController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NatterController;
use App\Http\Controllers\FrontierController;
use App\Http\Controllers\Wiki\WikiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Litted\PostController;
use App\Http\Controllers\Market\MarketController;
use App\Http\Controllers\Admin\Roles\{RoleController, PermissionController};
use App\Http\Controllers\Litted\CommunityController;
use App\Http\Controllers\Litted\PostCommentController;

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
    $md = new Markdown();
    dd($md);
});

Route::group(['middleware' => ['guest']], function () {
    Route::view('frontier', 'frontend.frontier.index', ['title' => trans('frontier.title')])->name('frontier');
    Route::view('frontier/register', 'frontend.frontier.register', ['title' => trans('frontier.register_office')])->name('frontier.register');
    Route::post('frontier/postRegister', [FrontierController::class, 'postRegister'])->name('frontier.postRegister');
    Route::view('frontier/login', 'frontend.frontier.login', ['title' => trans('frontier.enter_city')])->name('frontier.login');
    Route::post('frontier/postLogin', [FrontierController::class, 'postLogin'])->name('frontier.postLogin');

    // Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
    // Route::post('admin/postLogin', [AdminController::class, 'postLogin'])->name('admin.postLogin');
});

Route::group(['middleware' => ['auth']], function () {
    // Home page
    Route::get('/', function () {
        return redirect('/home');
    });
    Route::view('/home', 'frontend.home', ['title' => 'Home'])->name('home');

    // Authentication
    Route::view('frontier/password', 'frontend.frontier.password', ['title' => trans('frontier.password.change')])->name('frontier.password');
    Route::post('frontier/postPassword', [FrontierController::class, 'postPassword'])->name('frontier.postPassword');
    Route::get('frontier/logout', [FrontierController::class, 'logout'])->name('frontier.logout');

    // Bank
    Route::get('bank', [BankController::class, 'index'])->name('bank');
    Route::get('bank/atm', [BankController::class, 'atm'])->name('bank.atm');
    Route::post('bank/withdraw', [BankController::class, 'withdraw'])->name('bank.withdraw');
    Route::post('bank/deposit', [BankController::class, 'deposit'])->name('bank.deposit');
    Route::post('bank/transfer', [BankController::class, 'transfer'])->name('bank.transfer');

    // News
    Route::get('news', [NewsController::class, 'index'])->name('news');

    // Natter
    Route::get('natter', [NatterController::class, 'index'])->name('natter');

    // Shop
    Route::get('market', [MarketController::class, 'index'])->name('market');

    // Wiki
    Route::get('wiki', [WikiController::class, 'index'])->name('wiki');
    Route::get('wiki/list/{action?}', [WikiController::class, 'list'])->name('wiki.list');
    Route::get('wiki/add', [WikiController::class, 'manage'])->name('wiki.add');
    Route::post('wiki/save', [WikiController::class, 'store'])->name('wiki.save');
    Route::get('wiki/{id}/edit', [WikiController::class, 'manage'])->name('wiki.edit');
    Route::post('wiki/update/{id}', [WikiController::class, 'update'])->name('wiki.update');
    Route::get('wiki/{slug}', [WikiController::class, 'show'])->name('wiki.show');
    Route::get('wiki/{id}/delete', [WikiController::class, 'delete'])->name('wiki.delete');
    Route::get('wiki/{id}/restore', [WikiController::class, 'restore'])->name('wiki.restore');
    Route::get('wiki/{id}/destroy', [WikiController::class, 'destroy'])->name('wiki.destroy');

    // Litted
    Route::get(config('ath.litted.c_prefix') . '{slug}', [CommunityController::class, 'show'])->name('litted.communities.show');
    Route::get('communities/{owner?}', [CommunityController::class, 'index'])->name('litted.communities');
    Route::get('litted/create/community', [CommunityController::class, 'create'])->name('litted.community.create');
    Route::post('litted/store/community', [CommunityController::class, 'store'])->name('litted.community.store');
    Route::get('litted/edit/community/{slug}', [CommunityController::class, 'edit'])->name('litted.community.edit');
    Route::get('litted/delete/community/{slug}', [CommunityController::class, 'delete'])->name('litted.community.delete');
    Route::post('litted/update/community/{id}', [CommunityController::class, 'update'])->name('litted.community.update');
    Route::get('litted/restore/community/{slug}', [CommunityController::class, 'restore'])->name('litted.community.restore');
    Route::get('litted/destroy/community/{slug}', [CommunityController::class, 'destroy'])->name('litted.community.destroy');

    Route::get('litted/create/post/{slug}', [PostController::class, 'create'])->name('litted.post.create');
    Route::post('litted/store/post', [PostController::class, 'store'])->name('litted.post.store');
    Route::get('/ld/{community_slug}/posts/{post:slug}', [PostController::class, 'show'])->name('litted.posts.show');
    Route::post('/ld/{community_slug}/posts/{post:id}/comment', [PostCommentController::class, 'store'])->name('litted.posts.comments');

    Route::get('litted/{id}/edit', [PostController::class, 'edit'])->name('litted.post.edit');
    Route::post('litted/update/post/{id}', [PostController::class, 'update'])->name('litted.post.update');
    Route::get('litted/{id}/delete', [PostController::class, 'delete'])->name('litted.post.delete');
    Route::get('litted/{id}/restore', [PostController::class, 'restore'])->name('litted.post.restore');
    Route::get('litted/{id}/destroy', [PostController::class, 'destroy'])->name('litted.post.destroy');

    Route::post('litted/post/{post:id}', [PostController::class, 'vote'])->name('litted.post.vote');
});

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')
    ->group(
        function () {
            // Dashboard
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

            // Roles
            Route::get('roles/{name?}', [RoleController::class, 'index'])->name('roles');
            Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
            Route::get('role/{name}/edit', [RoleController::class, 'index'])->name('role.edit');
            Route::post('role/{name}/update', [RoleController::class, 'update'])->name('role.update');
            Route::post('role/{name}/permission', [RoleController::class, 'givePermission'])->name('role.permissions');
            Route::get('role/{name}/permission/revoke/{permission}', [RoleController::class, 'revokePermission'])->name('role.permission.revoke');
            Route::get('role/{name}/delete', [RoleController::class, 'delete'])->name('role.delete');
            Route::get('role/{name}/restore', [RoleController::class, 'restore'])->name('role.restore');
            Route::get('role/{name}/destroy', [RoleController::class, 'destroy'])->name('role.destroy');

            // Permissions
            Route::get('permissions/{name?}', [PermissionController::class, 'index'])->name('permissions');
            Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
            Route::get('permission/{name}/edit', [PermissionController::class, 'index'])->name('permission.edit');
            Route::post('permission/{name}/update', [PermissionController::class, 'update'])->name('permission.update');
            Route::post('permission/{name}/role/assign', [PermissionController::class, 'assignRole'])->name('permission.roles');
            Route::get('permission/{name}/role/{role}/remove', [PermissionController::class, 'removeRole'])->name('permission.role.remove');
            Route::get('permission/{name}/delete', [PermissionController::class, 'delete'])->name('permission.delete');
            Route::get('permission/{name}/restore', [PermissionController::class, 'restore'])->name('permission.restore');
            Route::get('permission/{name}/destroy', [PermissionController::class, 'destroy'])->name('permission.destroy');

            Route::get('users/status', [UserController::class, 'userOnlineStatus'])->name('admin.users.status');
            Route::get('users', [UserController::class, 'index'])->name('users');
            Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
            Route::post('users/store', [UserController::class, 'store'])->name('admin.users.store');
            Route::get('users/{id}/show', [UserController::class, 'show'])->name('admin.users.show');
            Route::get('users/edit', [UserController::class, 'edit'])->name('admin.users.edit');
            Route::post('users/{id}/update', [UserController::class, 'update'])->name('admin.users.update');
            Route::get('users/{id}/delete', [UserController::class, 'delete'])->name('admin.users.delete');
            Route::get('users/{id}/restore', [UserController::class, 'restore'])->name('admin.users.restore');
            Route::get('users/{id}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
        }
    );

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
