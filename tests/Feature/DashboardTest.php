<?php

use App\Models\User;

test('it loads the dashboard route successfully with status 200', function () {
    $response = $this->get('/dashboard');

    $response->assertStatus(200);
    $response->assertSee('Chirper');
    $response->assertSee('Início');
    $response->assertSee('Amigos');
    $response->assertSee('Mensagens');
    $response->assertSee('Definições');
});

test('it renders chirps formatted as facebook posts with reactions and comments', function () {
    $user = User::factory()->create(['name' => 'Maria Silva']);
    $user->chirps()->create([
        'message' => 'Primeira publicação estilo Facebook no Chirper Lite!',
    ]);

    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('Maria Silva');
    $response->assertSee('Primeira publicação estilo Facebook no Chirper Lite!');
    $response->assertSee('Gosto');
    $response->assertSee('Comentar');
    $response->assertSee('Partilhar');
    $response->assertSee('Público');
});

test('it displays responsive navigation tabs for amigos, mensagens, and definicoes', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee('tab-btn-feed');
    $response->assertSee('tab-btn-amigos');
    $response->assertSee('tab-btn-mensagens');
    $response->assertSee('tab-btn-definicoes');
    $response->assertSee('tab-btn-menu');
    $response->assertSee('view-amigos');
    $response->assertSee('view-mensagens');
    $response->assertSee('view-definicoes');
});
