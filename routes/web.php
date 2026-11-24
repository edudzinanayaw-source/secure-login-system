<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', fn() => redirect()->route('login'));

Route::middleware('auth')->group(function () {

    // Users must access this page before completing 2FA.
    Route::get('/two-factor-setup', fn() => view('two-factor-setup'))
        ->name('two-factor.setup');

    // All dashboards require confirmed 2FA.
    Route::middleware('require.2fa')->group(function () {

        Route::get('/dashboard', function () {
            return auth()->user()->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('user.dashboard');
        })->name('dashboard');

        Route::get('/admin', function () {
            $users = User::latest()->take(10)->get();
            $totalUsers = User::count();
            $totalAdmins = User::where('role', 'admin')->count();
            $totalRegularUsers = User::where('role', 'user')->count();

            return view('admin-dashboard', compact(
                'users',
                'totalUsers',
                'totalAdmins',
                'totalRegularUsers'
            ));
        })->middleware('role:admin')->name('admin.dashboard');

        Route::get('/user', fn() => view('user-dashboard'))
            ->middleware('role:user')->name('user.dashboard');
    });
});