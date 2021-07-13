<?php

namespace Tests\Feature;

use App\Models\Paste;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */

    public function main_event()
    {
        $post = Paste::factory()->create();
        $response = $this->get('/paste');
        $response->assertSee($post->name);
    }
}
