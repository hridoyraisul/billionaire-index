<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Number;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $users = \App\Models\User::latest('available_balance')->get();
    $users->transform(function ($user) {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'available_balance' => $user->available_balance,
            'avatar' => $user->avatar,
            'company' => $user->company,
            'state' => $user->state,
            'balance' => format_number($user->available_balance),
        ];
    });
    return view('welcome', compact('users'));
});

Route::get('/users', function () {
    $callback = function () {
        while (true) {
            balanceUpdate();
            while (ob_get_level() > 0) {
                ob_end_flush();
            }
            flush();
            if (connection_aborted()) exit;
            sleep(5);
        }
    };
    return response()->stream($callback, 200, [
        'X-Accel-Buffering' => 'no',
        'Content-Type' => 'text/event-stream',
        'Cache-Control' => 'no-cache',
    ]);
});

function balanceUpdate()
{
    $user = \App\Models\User::inRandomOrder()->first();
    $balance = rand(1000000000, 99999999999);
    $user->available_balance = $balance;
    $user->save();
    $user->balance = format_number($user->available_balance);
    $data = json_encode($user);
    echo "data: {$data}\n\n";
}

function format_number($number, $precision = 1)
{
    if ($number >= 1000000000000) {
        return round($number / 1000000000000, $precision) . 'T'; // Trillion
    } elseif ($number >= 1000000000) {
        return round($number / 1000000000, $precision) . 'B'; // Billion
    } elseif ($number >= 1000000) {
        return round($number / 1000000, $precision) . 'M'; // Million
    } elseif ($number >= 1000) {
        return round($number / 1000, $precision) . 'K'; // Thousand
    }
    return (string)$number; // For numbers less than 1000
}
