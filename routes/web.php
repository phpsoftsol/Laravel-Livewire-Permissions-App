<?php

use Illuminate\Support\Facades\Route;
use App\Models\Setting;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
     'auth:sanctum',
     config('jetstream.auth_session'),
     'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // Auth::user()->assignRole('Super Admin');
        $users= App\Models\User::orderBy('id', 'desc')->get();
        return view('dashboard' )->with('users', $users);
    })->name('dashboard');


    Route::get('/dashboard/index', \App\Http\Livewire\Admin\Dashboard\Index::class)->name('admin.dashboard.index');
    Route::get('/user/index', \App\Http\Livewire\Admin\User\Index::class)->name('admin.user.index');
    Route::get('/user/role/index', \App\Http\Livewire\Admin\User\Role\Index::class)->name('admin.user.role.index');
    Route::get('/user/team/index', \App\Http\Livewire\Admin\User\Team\Index::class)->name('admin.user.team.index');
    Route::get('/user/permission/index', \App\Http\Livewire\Admin\User\Permission\Index::class)->name('admin.user.permission.index');

    Route::get('/content/article/index', \App\Http\Livewire\Admin\Content\Article\Index::class)->name('admin.content.article.index');
    Route::get('/content/faq/index', \App\Http\Livewire\Admin\Content\FAQ\Index::class)->name('admin.content.faq.index');
    Route::get('/content/carousel/index', \App\Http\Livewire\Admin\Content\Carousel\Index::class)->name('admin.content.carousel.index');

    Route::get('/setting/category/index', \App\Http\Livewire\Admin\Setting\Category\Index::class)->name('admin.setting.category.index');
    Route::get('/setting/general/index', \App\Http\Livewire\Admin\Setting\General\Edit::class)->name('admin.setting.general.index');
    


});

