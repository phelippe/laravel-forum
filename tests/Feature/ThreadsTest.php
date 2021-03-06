<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test **/
    public function a_user_can_browse_threads()
    {
    	$thread = factory('Forum\Thread')->create();
        $response = $this->get('/threads');

        #$response->assertStatus(200);
        $response->assertSee($thread->title);

        $response = $this->get('/threads/' . $thread->id);

        $response->assertSee($thread->title);
    }
}
