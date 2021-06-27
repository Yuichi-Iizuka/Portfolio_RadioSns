<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGestProfileEdit()
    {
        
        $user = factory(User::class)->create();

        $response = $this->get(route('mypage.edit',$user->id));


        $response->assertRedirect(route('login'));
    }

    public function testAuthProfileEdit()
    {
        $this->withMiddleware();
        $user = factory(User::class)->create();

       $response = $this->actingAs($user)->get(route('mypage.edit',$user->id));

       $response->assertViewIs('user.edit',$user);
    }
}
