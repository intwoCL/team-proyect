<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthUserControllerTest extends TestCase
{

  /** @test */
  public function it_show_index()
  {
    $response = $this->get('/');
    $response->assertStatus(200);
  }
  
  /** @test */
  // public function it_should_access_login()
  // {
  //   $this->visit('/register')
  //     ->type('benja', 'username')
  //     ->type('123456', 'password')
  //     // ->check('terms')
  //     ->press('Register')
  //     ->seePageIs('/dashboard');
  // }
}
