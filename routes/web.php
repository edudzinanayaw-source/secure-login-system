<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Main Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Redirect authenticated users to their appropriate dashboard.
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    })->name('dashboard');

    // Administrator Dashboard
Route::get('/admin', function () {
    $users = \App\Models\User::latest()
        ->take(10)
        ->get();

    $totalUsers = \App\Models\User::count();

    $totalAdmins = \App\Models\User::where(
        'role',
        'admin'
    )->count();

    $totalRegularUsers = \App\Models\User::where(
        'role',
        'user'
    )->count();

    return view('admin-dashboard', compact(
        'users',
        'totalUsers',
        'totalAdmins',
        'totalRegularUsers'
    ));
})->middleware('role:admin')->name('admin.dashboard');

    // Regular User Dashboard
    Route::get('/user', function () {
        return view('user-dashboard');
    })->middleware('role:user')->name('user.dashboard');

    // Two-Factor Authentication Setup
    Route::get('/two-factor-setup', function () {
        return view('two-factor-setup');
    })->name('two-factor.setup');

});
