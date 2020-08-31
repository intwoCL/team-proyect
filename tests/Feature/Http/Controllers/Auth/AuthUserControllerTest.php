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
  
}
