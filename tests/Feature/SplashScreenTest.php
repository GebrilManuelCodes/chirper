<?php

test('it displays the splash screen overlay on the home page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('chirper-splash-overlay');
    $response->assertSee('Chirper');
    $response->assertSee('Entrar na Tela Principal');
});

test('it skips the splash overlay when requested via query parameter', function () {
    $response = $this->get('/?skip_splash=1');

    $response->assertStatus(200);
    $response->assertDontSee('chirper-splash-overlay');
});

test('it skips the splash overlay when a success session message exists', function () {
    $response = $this->withSession(['success' => 'Your chirp has been posted!'])->get('/');

    $response->assertStatus(200);
    $response->assertDontSee('chirper-splash-overlay');
});

test('it loads the standalone splash page successfully', function () {
    $response = $this->get('/splash');

    $response->assertStatus(200);
    $response->assertSee('Chirper');
    $response->assertSee('Acessar Tela Principal');
});
