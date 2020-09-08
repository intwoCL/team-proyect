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
    $this->assertEquals($result, $u->present()->getFullName()); 
  }

  /** @test */
  public function it_should_return_full_name_new_user()
  {
    $u = new User();
    $u->first_name = "Bem";
    $u->last_name = "Mo 2";
    $this->assertEquals("Bem Mo 2",$u->present()->getFullName()); 
  }

}
