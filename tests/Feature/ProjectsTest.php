<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_may_not_create_project()
    {
        $this->post('/projects')->assertRedirect('/');
    }
    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withExceptionHandling();
        // Given I am a user who is logged in
        $this->actingAs(factory('App\User')->create());
        // When they hit the endpoint /projects to create a new project, while passing the necessary data
        $this->post('/projects', [
            'title'=>'PHP Unit test project',
            'description'=>'Testing the description with PHP Unit'
        ]);
        // Then there should be a new project in the database
        $this->assertDatabaseHas('projects',['title'=> 'PHP Unit test project']);
    }
}
