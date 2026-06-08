<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AUTH CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BantuanController;
use App\Http\Controllers\Admin\EventBantuanController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\VerifikasiController;
use App\Http\Controllers\Admin\PengajuanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PenyaluranController as AdminPenyaluranController;
use App\Http\Controllers\Admin\PengambilanController as AdminPengambilanController;

/*
|--------------------------------------------------------------------------
| PETUGAS CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Petugas\DashboardController as PetugasDashboard;
use App\Http\Controllers\Petugas\PengambilanController;
use App\Http\Controllers\Petugas\PenyaluranController;
use App\Http\Controllers\Petugas\EventController;


/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('login.process');

Route::post('/logout', [LogoutController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware('auth', 'admin')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('admin.dashboard');

    Route::resource(
        'penyaluran',
        AdminPenyaluranController::class
    )->names('admin.penyaluran');

    Route::resource(
        'pengambilan',
        AdminPengambilanController::class
    )->names('admin.pengambilan');
    /*
    |--------------------------------------------------------------------------
    | BANTUAN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        '/bantuan',
        BantuanController::class
    )->names([
        'index'   => 'admin.bantuan.index',
        'create'  => 'admin.bantuan.create',
        'store'   => 'admin.bantuan.store',
        'show'    => 'admin.bantuan.show',
        'edit'    => 'admin.bantuan.edit',
        'update'  => 'admin.bantuan.update',
        'destroy' => 'admin.bantuan.destroy',
    ]);
    /*
    |--------------------------------------------------------------------------
    | EVENT
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/event',
        [EventBantuanController::class, 'index']
    )->name('admin.event.index');
    Route::post('/admin/event', [EventController::class, 'store']);
    Route::put('/admin/event/{id}', [EventController::class, 'update']);
    Route::delete('/admin/event/{id}', [EventController::class, 'destroy']);
     Route::get(
        '/event/create',
        [EventBantuanController::class, 'create']
    )->name('admin.event.create');

    Route::post(
        '/event',
        [EventBantuanController::class, 'store']
    )->name('admin.event.store');

    Route::get(
        '/event/{id}',
        [EventBantuanController::class, 'show']
    )->name('admin.event.show');

    Route::get(
        '/event/{id}/edit',
        [EventBantuanController::class, 'edit']
    )->name('admin.event.edit');

    Route::put(
        '/event/{id}',
        [EventBantuanController::class, 'update']
    )->name('admin.event.update');

    Route::delete(
        '/event/{id}',
        [EventBantuanController::class, 'destroy']
    )->name('admin.event.destroy');


    

    /*
    |--------------------------------------------------------------------------
    | MASYARAKAT
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/masyarakat',
        [MasyarakatController::class, 'index']
    )->name('admin.masyarakat.index');

    Route::get(
        '/masyarakat/create',
        [MasyarakatController::class, 'create']
    )->name('admin.masyarakat.create');

    Route::post(
        '/masyarakat/store',
        [MasyarakatController::class, 'store']
    )->name('masyarakat.store');

    Route::get(
        '/masyarakat/{id}/edit',
        [MasyarakatController::class, 'edit']
    )->name('admin.masyarakat.edit');

    Route::put(
        '/masyarakat/{id}',
        [MasyarakatController::class, 'update']
    )->name('masyarakat.update');

    Route::delete(
        '/masyarakat/{id}',
        [MasyarakatController::class, 'destroy']
    )->name('admin.masyarakat.destroy');

    Route::get(
        '/masyarakat/{id}',
        [MasyarakatController::class, 'show']
    )->name('admin.masyarakat.show');





    /*
    |--------------------------------------------------------------------------
    | VERIFIKASI
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/verifikasi',
        [VerifikasiController::class, 'index']
    )->name('admin.verifikasi.index');

    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/laporan',
        [LaporanController::class, 'index']
    )->name('admin.laporan.index');
});
/*
|--------------------------------------------------------------------------
| PENGAJUAN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::get('/pengajuan', [PengajuanController::class, 'index'])
        ->name('admin.pengajuan.index');

    Route::get(
        '/admin/pengajuan/create',
        [PengajuanController::class, 'create']
    )->name('pengajuan.create');

    Route::post(
        '/admin/pengajuan/store',
        [PengajuanController::class, 'store']
    )->name('pengajuan.store');

    Route::get(
        '/admin/pengajuan/{id}',
        [PengajuanController::class, 'show']
    )->name('pengajuan.show');

    Route::get(
        '/admin/pengajuan/{id}/edit',
        [PengajuanController::class, 'edit']
    )->name('pengajuan.edit');

    Route::put(
        '/admin/pengajuan/{id}',
        [PengajuanController::class, 'update']
    )->name('pengajuan.update');

    Route::delete(
        '/admin/pengajuan/{id}',
        [PengajuanController::class, 'destroy']
    )->name('pengajuan.destroy');
});




/*
|--------------------------------------------------------------------------
| USERS
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::get('/users', [UserController::class, 'index'])
        ->name('admin.users.index');

    Route::get('/users/create', [UserController::class, 'create']);

    Route::post('/users/store', [UserController::class, 'store']);

    Route::get('/users/{id}', [UserController::class, 'show']);

    Route::get('/users/{id}/edit', [UserController::class, 'edit']);

    Route::put('/users/{id}/update', [UserController::class, 'update']);

    Route::delete('/users/{id}/delete', [UserController::class, 'destroy']);
});



/*
|--------------------------------------------------------------------------
| PETUGAS
|--------------------------------------------------------------------------
*/

Route::prefix('petugas')->middleware(['auth', 'petugas'])->group(function () {

    Route::get('/dashboard', [PetugasDashboard::class, 'index'])
        ->name('petugas.dashboard');

    Route::get(
        '/event',
        [EventController::class, 'index']
    );
});

/*
|--------------------------------------------------------------------------
| PENGAMBILAN
|--------------------------------------------------------------------------
*/
Route::get(
    '/pengambilan',
    [PengambilanController::class, 'index']
)
    ->name('petugas.dashboard');
Route::prefix('petugas')
    ->middleware(['auth', 'petugas'])
    ->group(function () {

        Route::resource('pengambilan', PengambilanController::class);
    });

/*
|--------------------------------------------------------------------------
| PENYALURAN
|--------------------------------------------------------------------------
*/
Route::get(
    '/penyaluran',
    [PenyaluranController::class, 'index']
);
Route::prefix('petugas')
    ->middleware(['auth', 'petugas'])
    ->group(function () {

        Route::resource('penyaluran', PenyaluranController::class);
    });



/*
|--------------------------------------------------------------------------
| EVENT
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'petugas'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {

        Route::get(
            '/dashboard',
            [PetugasDashboard::class, 'index']
        )
            ->name('dashboard');

        Route::resource(
            'pengambilan',
            App\Http\Controllers\Petugas\PengambilanController::class
        );

        Route::resource(
            'penyaluran',
            App\Http\Controllers\Petugas\PenyaluranController::class
        );

        Route::resource('event', EventController::class);
    });


/*
|--------------------------------------------------------------------------
| MASYARAKAT
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Masyarakat\PengajuanController as MasyarakatPengajuanController;
use App\Http\Controllers\Masyarakat\StatusController;
use App\Http\Controllers\Masyarakat\EventController as MasyarakatEventController;
use App\Http\Controllers\Masyarakat\DashboardController as MasyarakatDashboard;

Route::middleware(['auth', 'masyarakat'])
    ->prefix('masyarakat')
    ->name('masyarakat.')
    ->group(function () {

        Route::get('/dashboard', [MasyarakatDashboard::class, 'index'])
            ->name('dashboard');

        Route::resource(
            'pengajuan',
            MasyarakatPengajuanController::class
        )->only([
            'index',
            'create',
            'store',
            'show'
        ]);

        Route::get('/status', [StatusController::class, 'index'])
            ->name('status.index');

        Route::get('/event', [MasyarakatEventController::class, 'index'])
            ->name('event.index');
    });
