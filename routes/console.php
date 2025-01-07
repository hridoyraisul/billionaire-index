<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('balance:update', function () {
    $user = \App\Models\User::inRandomOrder()->first();
    if (!$user) {
        $this->error('No users found.');
        return;
    }
    $balance = rand(100, 100000000);
    $user->available_balance = $balance;
    $user->save();
    $this->info('Balance updated for '. $user->name.' with new balance: '. $balance);
})->purpose('Update user available balance');

Artisan::command('invest', function () {
    $email = $this->ask('Enter user email');
    $user = \App\Models\User::where('email', $email)->first();
    if (!$user) {
        $this->error('User not found.');
        return;
    }
    $amount = $this->ask('Enter investment amount');
    $user->available_balance += $amount;
    $user->save();
    $this->info('Investment successful for ' . $user->name);
})->purpose('Display an inspiring quote');

Artisan::command('new:user', function () {
    $name = $this->ask('Enter user name');
    $email = $this->ask('Enter user email');
    $balance = $this->ask('Enter user balance');
    $user = new \App\Models\User();
    $user->name = $name;
    $user->email = $email;
    $user->available_balance = $balance;
    $user->password = \Illuminate\Support\Facades\Hash::make('12345678');
    $user->save();
    $this->info('User created successfully');
})->purpose('Create a new user');
