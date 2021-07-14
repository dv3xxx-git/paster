<?php

namespace Tests\Unit;

use App\Models\Paste;
use App\Models\User;
use App\Services\HashService;
use Carbon\Carbon;
use Tests\TestCase;

class PasteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testMain()
    {
        $paste = new Paste();
        $paste->factory(10)->create();
        $response = $this->get('/');
        $response->assertOk();
    }

    public function testBadAuthShow()
    {
        $paste = Paste::create([
            'name' => 'London to Paris',
            'timer' => Carbon::now(),
            'text' => '123',
            'change_lang' => 'js',
            'hash' => HashService::createHash(rand(1,50)),
            'accept_public' => 2,
            'accept_timer' => 0,
        ]);
        $response = $this->get(route('paste.show',$paste->hash));
        $response->assertStatus(401);
    }

    // public function testForbiddenShow()
    // {
    //     $user = User::factory(1)->create();

    //     $response = $this->actingAs($user);
    //     $paste = Paste::create([
    //         'name' => 'London to Paris',
    //         'timer' => Carbon::now(),
    //         'text' => '123',
    //         'change_lang' => 'js',
    //         'hash' => HashService::createHash(rand(1,50)),
    //         'accept_public' => 2,
    //         'accept_timer' => 0,
    //     ]);
    //     $response = $this->get(route('paste.show',$paste->hash));
    //     $response->assertStatus(401);
    // }


}
