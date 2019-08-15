<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_nao_esta_ativo()
    {
        $user = \factory('App\User')->create();
        $this->actingAs($user);
        $response = $this->get('/home');
        $response->assertStatus(200);
    }
}
