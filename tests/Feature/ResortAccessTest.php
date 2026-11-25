<?php

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

it('redirects guests to login before showing the private room', function () {
    $this->get('/panel')
        ->assertRedirect('/login')
        ->assertSessionHas('error', 'Debes iniciar sesión para acceder a esta sección.');
});

it('denies casino access to underage guests with the required message', function () {
    $minor = User::factory()->create(['age' => 16]);

    $this->actingAs($minor)
        ->get('/casino')
        ->assertRedirect('/panel')
        ->assertSessionHas('error', 'Acceso denegado: Debes ser mayor de edad');
});

it('denies the admin area to regular guests', function () {
    $guest = User::factory()->create(['is_admin' => false]);

    $this->actingAs($guest)
        ->get('/admin')
        ->assertRedirect('/')
        ->assertSessionHas('error', 'Acceso denegado: Zona exclusiva para administradores.');
});

it('lets administrators see the resort user list', function () {
    $administrator = User::factory()->create(['is_admin' => true]);
    $guest = User::factory()->create(['name' => 'Huésped de prueba']);

    $this->actingAs($administrator)
        ->get('/admin')
        ->assertOk()
        ->assertSee('Huésped de prueba');
});

it('authenticates valid credentials and allows logout', function () {
    $user = User::factory()->create([
        'email' => 'guest@resort.com',
        'password' => 'password',
    ]);

    $this->post('/login', [
        'email' => 'guest@resort.com',
        'password' => 'password',
    ])->assertRedirect('/panel');

    $this->get('/panel')->assertOk()->assertSee($user->name);

    $this->post('/logout')->assertRedirect('/');
    $this->assertGuest();
});

it('rejects invalid login credentials', function () {
    User::factory()->create([
        'email' => 'guest@resort.com',
        'password' => 'password',
    ]);

    $this->post('/login', [
        'email' => 'guest@resort.com',
        'password' => 'incorrect',
    ])
        ->assertRedirect('/login')
        ->assertSessionHas('error', 'No se pudo iniciar sesión. Revisa tu correo y contraseña.');

    $this->assertGuest();
});

it('registers a non-admin guest and starts an authenticated session', function () {
    $this->post('/register', [
        'name' => 'Nueva Huésped',
        'email' => 'nueva@resort.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'age' => 24,
    ])->assertRedirect('/panel');

    $this->assertDatabaseHas('users', [
        'name' => 'Nueva Huésped',
        'email' => 'nueva@resort.com',
        'age' => 24,
        'is_admin' => false,
    ]);

    $user = User::where('email', 'nueva@resort.com')->firstOrFail();
    expect(Hash::check('password', $user->password))->toBeTrue();

    $this->get('/panel')->assertOk()->assertSee('Nueva Huésped');
});

it('seeds the three demonstration accounts with the required roles and ages', function () {
    $this->seed(UserSeeder::class);

    expect(User::query()->count())->toBe(3);

    $administrator = User::where('email', 'admin@resort.com')->firstOrFail();
    expect($administrator->is_admin)->toBeTrue();
    expect($administrator->age)->toBe(35);
    expect(Hash::check('password', $administrator->password))->toBeTrue();

    $adultGuest = User::where('email', 'cliente@resort.com')->firstOrFail();
    expect($adultGuest->is_admin)->toBeFalse();
    expect($adultGuest->age)->toBe(25);

    $minorGuest = User::where('email', 'menor@resort.com')->firstOrFail();
    expect($minorGuest->is_admin)->toBeFalse();
    expect($minorGuest->age)->toBe(16);
});
