<?php

use App\Routes;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => auth()?->user()
    ? redirect()->route('dashboard')
    : view('welcome')
);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    foreach (Routes::cases() as $route) {
        Route::get($route->path(), fn () =>
            view($route->view()))->name($route->view()
        );
    }
});
