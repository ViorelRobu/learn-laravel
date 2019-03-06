<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_user_can_have_a_project()
    {
        $this->withExceptionHandling();

        $user=factory('App\User')->create();

        $attributes = ['title'=>'Unit test', 'description'=>' testing unit'];

        $user->project()->create($attributes);

        $this->assertEquals('Unit test', $user->project[0]->title);
    }
}
