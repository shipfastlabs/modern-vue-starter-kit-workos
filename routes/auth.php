<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Laravel\WorkOS\Http\Requests\AuthKitAuthenticationRequest;
use Laravel\WorkOS\Http\Requests\AuthKitLoginRequest;
use Laravel\WorkOS\Http\Requests\AuthKitLogoutRequest;

Route::get('login', fn (AuthKitLoginRequest $request): Symfony\Component\HttpFoundation\Response => $request->redirect())->middleware(['guest'])->name('login');

Route::get('authenticate', fn (AuthKitAuthenticationRequest $request) => tap(to_route('dashboard'), fn (): mixed => $request->authenticate()))->middleware(['guest']);

Route::post('logout', fn (AuthKitLogoutRequest $request): Symfony\Component\HttpFoundation\Response => $request->logout())->middleware(['auth'])->name('logout');
