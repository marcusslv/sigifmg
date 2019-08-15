<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_logado_acessa_esta_view()
    {
        $user = \factory('App\User')->create();
        $this->actingAs($user);
        $this->get(route('admin.user.index'))
            ->assertStatus(200)
            ->assertViewIs('user.index');
    }
    /**
     * Teste se user não estiver lodado
     *
     * @return void
     */
    public function test_user_nao_logado_nao_acessa_esta_view()
    {
        $user = \factory('App\User')->create();
        $this->get(route('admin.user.index'))
            ->assertStatus(302);
    }

    public function test_user_acessa_page_create()
    {
        $user = \factory('App\User')->create();
        $this->actingAs($user);
        $this->get(route('admin.user.create'))
            ->assertStatus(200);
    }

    public function test_user_acessa_page_edit()
    {
        $user = \factory('App\User')->create();
        $this->actingAs($user);
        $this->post(route('admin.user.update'))
            ->assertStatus(200)
            ->assertViewIs('user.index');
    }
}
