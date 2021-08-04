<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    User::query()->delete();

    User::factory()->create([
        'email_verified_at' => null
    ]);

    User::factory()->create([
        'email_verified_at' => null
    ]);

    User::factory()->create([
        'email_verified_at' => 1
    ]);
    User::factory()->create([
        'email_verified_at' => 4
    ]);

    User::factory()->create();
    User::factory()->create();

    $res = User::orderBy('email_verified_at')->orderBy('id')->cursorPaginate(2, ['*'], null, null);

    $nextCursor = $res->nextCursor();
    // next cursor will have email_verified_at as null param

    User::orderBy('email_verified_at')->orderBy('id')->cursorPaginate(2, ['*'], null, $nextCursor);

});
