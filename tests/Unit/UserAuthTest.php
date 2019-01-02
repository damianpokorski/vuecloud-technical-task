<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUnauthorisedUserRedirectToLoginPage()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
        $response->assertRedirect('login');
    }
}
