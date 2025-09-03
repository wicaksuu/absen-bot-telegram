<?php

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;

// Unit test untuk model User - dibuat oleh AI
uses(Tests\TestCase::class, RefreshDatabase::class);

it('can check admin role', function () {
    $user = User::factory()->make(['role' => 'admin']);
    expect($user->isAdmin())->toBeTrue();
});

it('can check subscription status', function () {
    $user = User::factory()->make(['subscription_expires_at' => Carbon::now()->addDay()]);
    expect($user->isSubscribed())->toBeTrue();
});
