<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class UserTest extends TestCase
{
  /** @test */
  public function it_should_return_full_name()
  {
    $u = factory(User::class)->make();
    $result = $u->first_name . " " . $u->last_name;
    $this->assertEquals($result, $u->getFullName()); 
  }

  /** @test */
  public function it_should_error_full_name()
  {
    $u = new User();
    $u->first_name = "Bem";
    $u->last_name = "Mo 2";
    $this->assertFalse("error", $u->getFullName()); 
  }

}
