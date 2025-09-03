<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;

// Feature test untuk middleware admin - dibuat oleh AI
uses(RefreshDatabase::class);

it('denies access for non admin', function () {
    $user = User::factory()->create(['role' => 'user']);
    actingAs($user)->get('/admin/users')->assertForbidden();
});

it('allows access for admin', function () {
    $user = User::factory()->create(['role' => 'admin']);
    actingAs($user)->get('/admin/users')->assertOk();
});
