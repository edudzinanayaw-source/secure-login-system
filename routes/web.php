<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\TicketController;

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
                // Regular user helpdesk routes
        Route::get('/tickets', [TicketController::class, 'index'])
            ->middleware('role:user')
            ->name('tickets.index');

        Route::get('/tickets/create', [TicketController::class, 'create'])
            ->middleware('role:user')
            ->name('tickets.create');

        Route::post('/tickets', [TicketController::class, 'store'])
            ->middleware('role:user')
            ->name('tickets.store');

        Route::get('/tickets/{ticket}', [TicketController::class, 'show'])
            ->middleware('role:user')
            ->name('tickets.show');

        // Admin helpdesk routes
        Route::get('/admin/tickets', [TicketController::class, 'adminIndex'])
            ->middleware('role:admin')
            ->name('admin.tickets.index');

        Route::patch('/admin/tickets/{ticket}', [TicketController::class, 'adminUpdate'])
            ->middleware('role:admin')
            ->name('admin.tickets.update');

        Route::get('/admin', function () {
            $users = User::latest()->get();
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